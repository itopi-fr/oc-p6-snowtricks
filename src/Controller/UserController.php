<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'app_user_')]
class UserController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // Deny if not logged in
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');

        // TODO: lire ça
        // https://symfony.com/doc/current/security/user_checkers.html
        // https://symfony.com/doc/current/security/voters.html


        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/{email}', name: 'detail')]
    public function detail(User $user): Response
    {
        dd($user);

        return $this->render('user/index.html.twig', [
            'controller_name' => 'User detail',
        ]);
    }

//    #[Route('/user/password-reset/{token}', name: 'app_user_password_reset')]
//    public function passwordReset(string $token): Response
//    {
//        return $this->render('user/password-reset.html.twig', [
//            'controller_name' => 'UserController',
//            'token' => $token,
//        ]);
//    }
//
//
//    #[Route('/user/password-forgotten', name: 'app_user_password_forgotten')]
//    public function passwordForgotten(): Response
//    {
//        return $this->render('user/password-forgotten.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
//    }
}
