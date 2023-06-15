<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    #[Route('/user/login', name: 'app_user_login')]
    public function login(): Response
    {
        return $this->render('user/login.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    #[Route('/user/logout', name: 'app_user_logout')]
    public function logout(): Response
    {
        return $this->render('user/logout.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    #[Route('/user/register', name: 'app_user_register')]
    public function register(): Response
    {
        return $this->render('user/register.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    #[Route('/user/password-reset/{token}', name: 'app_user_password_reset')]
    public function passwordReset(string $token): Response
    {
        return $this->render('user/password-reset.html.twig', [
            'controller_name' => 'UserController',
            'token' => $token,
        ]);
    }


    #[Route('/user/password-forgotten', name: 'app_user_password_forgotten')]
    public function passwordForgotten(): Response
    {
        return $this->render('user/password-forgotten.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
