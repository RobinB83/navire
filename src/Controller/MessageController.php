<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Message;
use App\Form\MessageType;
use App\Service\GestionContact;
/**
 * @Route("/message", name="message_")
 */
class MessageController extends AbstractController {

    /**
     * @Route("/contact", name="message")
     */
    public function demandeContact(Request $request): Response {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
                $message = $form->getData();

            GestionContact::envoiMailContactMessage($message);

            $this->addFlash('notification', "Votre message a bien été envoyé");
            return $this->redirectToRoute("message_message");
        }
        return $this->render('message/contact.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

}
