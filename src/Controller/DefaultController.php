<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home()
    {
        return $this->render('default/home.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard", methods={"GET"})
     */
    public function dashboard()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('default/dashboard.html.twig');
    }

    /**
     * @Route("/a-propos", name="about", methods={"GET"})
     */
    public function about()
    {
        return $this->render('default/a-propos.html.twig');
    }

    /**
     * @Route("/contact", name="contact", methods={"GET"})
     */
    public function contact()
    {
        return $this->render('default/contact.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions", methods={"GET"})
     */
    public function mentions()
    {
        return $this->render('default/mentions-legales.html.twig');
    }
}