<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

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
     * @Route("/profile", name="profile", methods={"GET"})
     */
    public function profile()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('profile/profile.html.twig');
    }

    /**
     * @Route("/a-propos", name="about", methods={"GET"})
     */
    public function about()
    {
        return $this->render('default/a-propos.html.twig');
    }

    /**
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     */
    public function contact(Request $request, MailerInterface $mailer) :Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $email = (new Email())
                ->from(new Address($data['email'], $data['name']))
                //->from($data['email'])
                ->to($this->getParameter('email_contact')) // # config/services.yaml
                //->cc('bar@example.com')
                //->bcc('baz@example.com')
                ->replyTo($data['email'])
                ->priority(Email::PRIORITY_NORMAL)
                ->subject('[MONTOURNOI.ORG] ' .$data['object'])
                ->text('De: ' .$data['name'] .'( ' .$data['email'] .' )' .PHP_EOL. 'Message : ' .$data['message']);
                //->html('<h1>Lorem ipsum</h1> <p>...</p>')

            $mailer->send($email);

            return $this->redirectToRoute('email_success');
        }

        return $this->render('default/contact.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/email_success", name="email_success", methods={"GET"})
     */
    public function emailSuccess()
    {
        return $this->render('email/email_success.html.twig');
    }

    /**
     * @Route("/email_error", name="email_error", methods={"GET"})
     */
    public function emailError()
    {
        return $this->render('email/email_error.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions", methods={"GET"})
     */
    public function mentions()
    {
        return $this->render('default/mentions-legales.html.twig');
    }

    /**
     * @Route("/politique-de-confidentialite", name="rgpd", methods={"GET"})
     */
    public function rgpd()
    {
        return $this->render('default/politique-de-confidentialite.html.twig');
    }
}