<?php

namespace App\Controller;

use App\Entity\Gamer;
use App\Form\GamerType;
use App\Repository\GamerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gamer")
 */
class GamerController extends AbstractController
{
    /**
     * @Route("/", name="gamer_index", methods={"GET"})
     */
    public function index(GamerRepository $gamerRepository): Response
    {
        return $this->render('gamer/index.html.twig', [
            'gamers' => $gamerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gamer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gamer = new Gamer();
        $form = $this->createForm(GamerType::class, $gamer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gamer);
            $entityManager->flush();

            return $this->redirectToRoute('gamer_index');
        }

        return $this->render('gamer/new.html.twig', [
            'gamer' => $gamer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gamer_show", methods={"GET"})
     */
    public function show(Gamer $gamer): Response
    {
        return $this->render('gamer/show.html.twig', [
            'gamer' => $gamer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gamer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gamer $gamer): Response
    {
        $form = $this->createForm(GamerType::class, $gamer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gamer_index');
        }

        return $this->render('gamer/edit.html.twig', [
            'gamer' => $gamer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gamer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gamer $gamer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gamer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gamer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gamer_index');
    }
}
