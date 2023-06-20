<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickCategoryController extends AbstractController
{
    #[Route('/trick/category', name: 'app_trick_category')]
    public function index(): Response
    {
        return $this->render('trick_category/index.html.twig', [
            'controller_name' => 'TrickCategoryController',
        ]);
    }
}
