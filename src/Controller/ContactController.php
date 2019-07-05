<?php

namespace App\Controller;

use App\Entity\Adherent;
use App\Form\AdherentType;
use App\Form\RoleType;
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
    public function inscrire()
    {
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);
        return $this->render('contact/inscrire.html.twig', [
            'controller_name' => 'ContactController',
            'createForm' => $form->createView()
        ]);
    }
    /**
     * @Route("/connect", name="connect")
     */
    public function connect()
    {
        $form = $this->createForm(RoleType::class);
        return $this->render('contact/connect.html.twig', [
            'controller_name' => 'ContactController',
            'contactForm' => $form->createView()
        ]);
    }
}
