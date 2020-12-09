<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message", name="message_")
 */
class MessageController extends AbstractController {

    /**
     * @Route("/message", name="message")
     */
    public function index(): Response {
        return $this->render('message/contact.html.twig', [
                    'controller_name' => 'MessageController',
        ]);
    }

}
