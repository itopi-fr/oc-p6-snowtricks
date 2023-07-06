<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TrickRepository;
use App\Repository\FileRepository;


class HomeController extends AbstractController
{
    #[Route(['/', '/home'], name: 'app_home')]
    public function index(TrickRepository $trickRepository): Response
    {
        $tricks = $trickRepository->findAll();

        // Hydrate the tricks with proper objects (user, category, forumMessages, media)
        foreach ($tricks as $trick) {
            $trick = $trickRepository->findOneBySlugWithEverything($trick->getSlug());
            dump($trick);
        }

        dump($tricks);


        return $this->render('home/index.html.twig', [
            'tricks' => $tricks,
        ]);
    }
}
