<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Form\TournoiType;
use App\Repository\TournamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="home_dashboard", methods={"GET"})
     */
    public function index(TournamentRepository $tournamentRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        return $this->render('dashboard/index.html.twig', [
            'tournaments' => $tournamentRepository->findBy( ['manager' => $this->getUser()->getId()], ["date_begin" => "DESC"] )
        ]);
    }

    /**
     * @Route("/new", name="new_tournoi", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        $tournament = new Tournament();
        $tournament->setManager($this->getUser());
        $form = $this->createForm(TournoiType::class, $tournament);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tournament);
            $entityManager->flush();

            return $this->redirectToRoute('edit_tournoi', array('id' => $tournament->getId()));
        }

        return $this->render('dashboard/new.html.twig', [
            'tournament' => $tournament,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="view_tournoi", methods={"GET"})
     */
    public function show(Tournament $tournament): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        if ($tournament->getManager() == $this->getUser()) // On vérifie que le tournoi à afficher nous apparient bien !
            return $this->render('dashboard/view.html.twig', [
            'tournament' => $tournament
        ]);
        else
            return $this->redirectToRoute('home_dashboard');
    }

    /**
     * @Route("/{id}/edit", name="edit_tournoi", methods={"GET","POST"})
     */
    public function edit(Request $request, Tournament $tournament): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        if ($tournament->getManager() === $this->getUser()) { // On vérifie que le tournoi à afficher nous appartient bien !
            $form = $this->createForm(TournoiType::class, $tournament);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('home_dashboard');
            }

            return $this->render(
                'dashboard/edit.html.twig', [
                'tournament' => $tournament,
                'form'       => $form->createView()
            ]
            );
        }
    else
        return $this->redirectToRoute('home_dashboard');
    }

    /**
     * @Route("/{id}", name="delete_tournoi", methods={"DELETE"})
     */
    public function delete(Request $request, Tournament $tournament): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        if ($this->isCsrfTokenValid('delete'.$tournament->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tournament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home_dashboard');
    }

}