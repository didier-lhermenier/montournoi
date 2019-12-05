<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tournoi", name="index", methods={"GET"})
 */

class TournamentController extends AbstractController
{
    /**
     * @Route("/", name="viewTournament", methods={"GET"})
     */
    public function viewTournament()
    {
        return $this->render('tournament/dashboard.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard", methods={"GET"})
     */
    public function dashboard()
    {
        return $this->render('tournament/dashboard.html.twig');
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

}