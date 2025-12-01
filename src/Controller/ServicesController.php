<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Prestataire;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'services')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $sort = $request->query->get('sort', 'name');
        $orderMap = [
            'name' => ['nomService' => 'ASC'],
            'name_desc' => ['nomService' => 'DESC'],
            'price' => ['prix' => 'ASC'],
            'price_desc' => ['prix' => 'DESC'],
            'new' => ['id' => 'DESC'],
        ];
        $orderBy = $orderMap[$sort] ?? ['nomService' => 'ASC'];

        $services = $em->getRepository(Service::class)->findBy([], $orderBy);
        $categories = ['Tous', 'Plomberie', 'Peinture', 'Électricité', 'Nettoyage', 'Jardinage', 'Coiffure'];

        return $this->render('services.html.twig', [
            'services' => $services,
            'categories' => $categories,
            'total_services' => count($services),
            'sort' => $sort,
        ]);
    }

    #[Route('/service/{id}', name: 'app_service_show', methods: ['GET', 'POST'])]
    public function show(int $id, Request $request, EntityManagerInterface $em, Security $security): Response
    {
        $service = $em->getRepository(Service::class)->find($id);

        if (!$service) {
            throw $this->createNotFoundException('Service non trouvé');
        }

        $user = $security->getUser();
        $canReview = false;
        $client = null;

        if ($user) {
            $client = $em->getRepository(\App\Entity\Client::class)->findOneBy(['user' => $user]);
            if ($client) {
                // Check if client has a completed reservation for this service
                $reservation = $em->getRepository(\App\Entity\Reservation::class)->findOneBy([
                    'client' => $client,
                    'service' => $service,
                    'statut' => 'Terminé'
                ]);

                if ($reservation) {
                    $canReview = true;
                }
            }
        }

        // Handle Review Submission
        if ($request->isMethod('POST')) {
            if (!$user) {
                return $this->redirectToRoute('app_login');
            }

            if (!$canReview) {
                $this->addFlash('error', 'Vous devez avoir terminé une réservation pour ce service avant de pouvoir laisser un avis.');
                return $this->redirectToRoute('app_service_show', ['id' => $id]);
            }

            $note = $request->request->get('note');
            $commentaire = $request->request->get('commentaire');

            if ($note) {
                $review = new \App\Entity\Review();
                $review->setNote((int) $note);
                $review->setCommentaire($commentaire);
                $review->setDateAvis(new \DateTimeImmutable());
                $review->setClient($client);
                $review->setService($service);

                $em->persist($review);
                $em->flush();

                $this->addFlash('success', 'Votre avis a été ajouté avec succès.');
                return $this->redirectToRoute('app_service_show', ['id' => $id]);
            }
        }

        return $this->render('service/show.html.twig', [
            'service' => $service,
            'canReview' => $canReview,
        ]);
    }

    #[Route('/services/new', name: 'services_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, Security $security): Response
    {
        $user = $security->getUser();
        $isProvider = $user instanceof User && $this->isGranted('ROLE_PRESTATAIRE');

        // Handle Edit Mode
        $editId = $request->query->get('edit');
        $service = null;

        if ($editId) {
            $service = $em->getRepository(Service::class)->find($editId);

            // Security check: ensure user owns this service
            if ($service && $isProvider) {
                $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
                if ($service->getPrestataire() !== $prestataire) {
                    throw $this->createAccessDeniedException('Vous ne pouvez pas modifier ce service.');
                }
            }
        }

        if (!$service) {
            $service = new Service();
        }

        if ($request->isMethod('POST')) {
            $service->setNomService($request->request->get('nomService', 'Service sans nom'));
            $service->setDescription($request->request->get('description'));
            $service->setCategorie($request->request->get('categorie'));
            $prix = $request->request->get('prix');
            $service->setPrix($prix !== null && $prix !== '' ? (float) $prix : null);
            $duree = $request->request->get('duree');
            $service->setDuree($duree !== null && $duree !== '' ? (int) $duree : null);

            // Handle image upload
            $imageFile = $request->files->get('image');
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads/services',
                        $newFilename
                    );
                    $service->setImage('/uploads/services/' . $newFilename);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement de l\'image.');
                }
            }

            // Associate with provider if logged in
            if ($isProvider && !$service->getPrestataire()) {
                $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);

                // Auto-create if missing (safety net)
                if (!$prestataire) {
                    $prestataire = new Prestataire();
                    $prestataire->setUser($user);
                    $em->persist($prestataire);
                    $em->flush(); // Need ID
                }

                $service->setPrestataire($prestataire);
            }

            if (!$service->getId()) {
                $service->setDisponible(true);
                $em->persist($service);
                $message = 'Service ajouté avec succès.';
            } else {
                $message = 'Service modifié avec succès.';
            }

            $em->flush();

            $this->addFlash('success', $message);

            // Redirect to provider dashboard if provider
            if ($isProvider) {
                return $this->redirectToRoute('app_provider_dashboard');
            }

            return $this->redirectToRoute('services');
        }

        return $this->render('service_new.html.twig', [
            'service' => $service->getId() ? $service : null,
            'is_edit' => (bool) $service->getId()
        ]);
    }
}
