<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumMessageController extends AbstractController
{
    #[Route('/forum/message', name: 'app_forum_message')]
    public function index(): Response
    {
        return $this->render('forum_message/index.html.twig', [
            'controller_name' => 'ForumMessageController',
        ]);
    }
}
