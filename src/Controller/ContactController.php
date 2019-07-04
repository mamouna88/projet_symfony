<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    /**
     * @Route("/pay", name="pay")
     */
    public function stripe()
    {
        return $this->render('contact/pay.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('contact/register.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    /**
     * @Route("/connect", name="connect")
     */
    public function connect()
    {
        return $this->render('contact/connect.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
