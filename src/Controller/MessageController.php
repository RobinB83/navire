<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Message;
use App\Form\MessageType;
/**
 * @Route("/message", name="message_")
 */
class MessageController extends AbstractController {

    /**
     * @Route("/contact", name="message")
     */
    public function demandeContact(Request $request) {
        $contact = new Message();
        $form = $this->createForm(MessageType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('notification', "Votre message a bien été envoyé");
            $contact = $form->getData();
            $contact->setDatePremierContact(new \DateTime());

            //$gestionContact->envoiMailContact($contact);


            return $this->redirectToRoute("message");
        }
        return $this->render('message/contact.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

}
