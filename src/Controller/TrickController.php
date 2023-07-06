<?php

namespace App\Controller;


use App\Repository\TrickRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/trick', name: 'trick_')]
class TrickController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(TrickRepository $trickRepository): Response
    {
        $tricks = $trickRepository->findAll();

        return $this->render('trick/list.html.twig', [
            'controller_name' => 'TrickController => create',
            'tricks' => $tricks,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('trick/create.html.twig', [
            'controller_name' => 'TrickController => create',
        ]);
    }



    #[Route('/edit/{slug}', name: 'edit')]
    public function edit($slug): Response
    {
        return $this->render('trick/edit.html.twig', [
            'controller_name' => 'TrickController => edit',
            'trick_id' => $slug,
        ]);
    }


    #[Route('/{slug}', name: 'detail')]
    public function detail(Request $request, TrickRepository $trickRepository, UserRepository $userRepository): Response
    {
        $trickSlug = $request->get('slug');
//        $trick = $trickRepository->findOneBy(['slug' => $trickSlug]);
//        $trick = $trickRepository->findOneTrickBySlugWithUser($trickSlug);
        $trick = $trickRepository->findOneBySlugWithEverything($trickSlug);
        dump($trickSlug);
        dump($trick);

        // User
        // TODO: pas sûr que ce soit très propre ça.
        // Peut-être moyen de le récupérer côté trick directement ?
//        $user = $userRepository->findOneBy(['id' => $trick->getUser()->getId()]);
//        $trick->setUser($user);



        // Twig Render
        return $this->render('trick/display.html.twig', [
            'controller_name' => 'TrickController => detail',
            'trick' => $trick,
        ]);
    }

    #[Route('/trick/remove/{slug}', name: 'app_trick_remove')]
    public function remove($slug): Response
    {
        return $this->render('trick/remove.html.twig', [
            'controller_name' => 'TrickController => remove',
            'slug' => $slug,
        ]);
    }


}
