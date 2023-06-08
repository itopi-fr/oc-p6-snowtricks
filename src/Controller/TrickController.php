<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    #[Route('/trick/new', name: 'app_trick_new')]
    public function new(): Response
    {
        return $this->render('trick/new.html.twig', [
            'controller_name' => 'TrickController',
        ]);
    }



    #[Route('/trick/edit/{trickId}', name: 'app_trick_edit')]
    public function edit($trickId): Response
    {
        return $this->render('trick/edit.html.twig', [
            'controller_name' => 'TrickController',
            'trick_id' => $trickId,
        ]);
    }


    #[Route('/trick/{trickId}', name: 'app_trick_display')]
    public function display($trickId): Response
    {
        return $this->render('trick/display.html.twig', [
            'controller_name' => 'TrickController',
            'trick_id' => $trickId,
        ]);
    }


}
