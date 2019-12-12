<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Repository\TournamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tournoi")
 */

class TournamentController extends AbstractController
{
    /**
     * @Route("/", name="viewTournaments", methods={"GET", "POST"})
     */
    public function viewTournaments(Request $request)
    {
        /* if POST
        {
            return $this->render('tournament/show.html.twig');
        }
        else // GET
        {

        }*/

            $tournaments = $this->getDoctrine()->getRepository(Tournament::class)->findBy(["is_private" => false], ["date_begin" => "DESC"]);
            return $this->render('tournament/home.html.twig', [
                'tournaments' => $tournaments
            ]);
    }

    /**
     * @Route("/create", name="createTournament", methods={"GET"})
     */
    public function createTournament()
    {
        return $this->render('tournament/index.html.twig');
    }

    /**
     * @Route("/mod", name="modTournament", methods={"GET"})
     */
    public function modTournament()
    {
        return $this->render('tournament/index.html.twig');
    }

    /**
     * @Route("/del", name="delTournament", methods={"GET"})
     */
    public function delTournament()
    {
        return $this->render('tournament/index.html.twig');
    }

    /**
     * @Route("/show", name="show_tournament", methods={"GET"})
     */
    public function show(TournamentRepository $tournamentRepository, Request $request)
    {
        $id = $request->query->get('id'); // ?id=2
        $tournament = $tournamentRepository->find($id);

        return $this->render('tournament/show.html.twig', [
            'tournament' => $tournament
        ]);
    }

}