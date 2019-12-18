<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Repository\TournamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tournoi")
 */

class TournoiController extends AbstractController
{
    /**
     * @Route("/", name="index_tournoi", methods={"GET", "POST"})
     */
    public function index(Request $request)
    {
        $tournaments = $this->getDoctrine()->getRepository(Tournament::class)->findBy(["is_private" => false], ["date_begin" => "DESC"]);

        return $this->render('tournoi/home.html.twig', [
            'tournaments' => $tournaments
        ]);
    }

    /**
     * @Route("/show", name="show_tournoi", methods={"GET"})
     */
    public function show(TournamentRepository $tournamentRepository, Request $request)
    {
        $id = $request->query->get('id'); // ?id=2
        $tournament = $tournamentRepository->findOneBy(['id'=> $id, 'is_private'=> false]);
        if ($tournament) // On vérifie qu'on a bien les droits pour ce tournoi de type PUBLIC !
            return $this->render('tournoi/show.html.twig', ['tournament' => $tournament]);
        else
            return $this->redirectToRoute('home');
    }

}