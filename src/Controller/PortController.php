<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Port;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PortType;

/**
     * @Route("/port", name="port_")
     */
class PortController extends AbstractController
{
    /**
     * @Route("/creer", name="port_")
     */
    public function creer(Request $request, \Doctrine\ORM\EntityManagerInterface $manager): Response
    {
        $port= new Port();
        //$Paysrepo->findAll()
        $form=$this->createForm(PortType::class, $port);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($port);
            $manager->flush();
            return $this->redirectToRoute('accueil');
        }
        return $this->render('port/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
