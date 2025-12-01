<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    public function __construct(
        private VerifyEmailHelperInterface $verifyEmailHelper,
        private MailerInterface $mailer
    ) {
    }
    #[Route('/test-dsn', name: 'test_dsn')]
    public function testDsn(): Response
    {
        dd($_ENV['MAILER_DSN'] ?? 'pas défini');
    }
    #[Route('/test-mail', name: 'test_mail')]
    public function testMail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('ahmedmeftah42@gmail.com')          // même email que dans MAILER_DSN
            ->to('ahmedmeftah56@gmail.com')           // ou une autre adresse à toi
            ->subject('Test Symfony Mailer')
            ->text('Ceci est un test.');

        try {
            $mailer->send($email);
            return new Response('OK: email envoyé');
        } catch (\Throwable $e) {
            return new Response('ERREUR: ' . $e->getMessage(), 500);
        }
    }


    #[Route('/register', name: 'app_register', methods: ['GET', 'POST'])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ): Response {
        if ($request->isMethod('POST')) {
            try {
                $user = new User();

                $user->setNom($request->request->get('nom', ''));
                $user->setPrenom($request->request->get('prenom', ''));

                $email = $request->request->get('email', '');
                $user->setEmail($email);

                // Vérifier si l'email existe déjà
                $existing = $userRepository->findOneBy(['email' => $email]);
                if ($existing) {
                    return $this->json([
                        'success' => false,
                        'message' => 'Cet email est déjà utilisé. Veuillez en choisir un autre.'
                    ]);
                }

                $tel = $request->request->get('tel', '');
                if (!empty($tel)) {
                    $user->setTel($tel);
                }

                $adresse = $request->request->get('adresse', '');
                if (!empty($adresse)) {
                    $user->setAdresse($adresse);
                }

                $role = $request->request->get('role');
                if (empty($role)) {
                    $role = 'client';
                }
                $user->setRole((string) $role);

                $plain = $request->request->get('password', '');
                $hashed = $passwordHasher->hashPassword($user, $plain);
                if (method_exists($user, 'setPassword')) {
                    $user->setPassword($hashed);
                } else {
                    $user->setMotDePasse($hashed);
                }

                $user->setIsVerified(false);

                $entityManager->persist($user);
                $entityManager->flush();

                $signature = $this->verifyEmailHelper->generateSignature(
                    'app_verify_email',
                    $user->getId(),
                    $user->getEmail(),
                    ['id' => $user->getId()]
                );

                $confirmationEmail = (new Email())
                    ->from('ahmedmeftah42@gmail.com')
                    ->to($user->getEmail())
                    ->subject('Confirmez votre adresse email')
                    ->html(
                        '<p>Merci de confirmer votre compte en cliquant sur ce lien :</p>' .
                        '<p><a href="' . $signature->getSignedUrl() . '">Confirmer mon compte</a></p>'
                    );
                try {
                    $this->mailer->send($confirmationEmail);
                } catch (\Throwable $e) {
                    // Log error but allow registration to proceed, or handle as needed
                    error_log('Error sending verification email: ' . $e->getMessage());
                    // Optionally add a flash message warning the user
                    // $this->addFlash('warning', 'Erreur lors de l\'envoi de l\'email de vérification.');
                }

                return $this->json([
                    'success' => true,
                    'message' => 'Inscription réussie ! Vérifiez votre email pour confirmer votre compte.',
                    'redirect' => $this->generateUrl('app_login')
                ]);

            } catch (\Exception $e) {
                error_log($e->getMessage());

                return $this->json([
                    'success' => false,
                    'message' => 'Erreur : ' . $e->getMessage()
                ]);
            }
        }

        return $this->render('registration/register.html.twig');
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $id = $request->query->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_login');
        }

        $user = $userRepository->find($id);
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        try {
            $this->verifyEmailHelper->validateEmailConfirmation(
                $request->getUri(),
                $user->getId(),
                $user->getEmail()
            );
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('verify_email_error', $e->getReason());
            return $this->redirectToRoute('app_login');
        }

        $user->setIsVerified(true);
        $entityManager->flush();

        $this->addFlash('success', 'Votre adresse email a été vérifiée.');

        return $this->redirectToRoute('app_login');
    }
}
