<?php

namespace App\Controller;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/services/new', name: 'services_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $service = new Service();
            $service->setNomService($request->request->get('nomService', 'Service sans nom'));
            $service->setDescription($request->request->get('description'));
            $service->setCategorie($request->request->get('categorie'));
            $prix = $request->request->get('prix');
            $service->setPrix($prix !== null && $prix !== '' ? (float)$prix : null);
            $duree = $request->request->get('duree');
            $service->setDuree($duree !== null && $duree !== '' ? (int)$duree : null);
            $service->setDisponible(true);

            $em->persist($service);
            $em->flush();

            $this->addFlash('success', 'Service ajouté avec succès.');
            return $this->redirectToRoute('services');
        }

        return $this->render('service_new.html.twig');
    }
}

