<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NavireType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Navire;
use App\Repository\NavireRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/navire", name="navire_")
 */
class NavireController extends AbstractController {

     /**
   * 
   * @Route("/edit/{id}", name="edit")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return Response
   */
    public function edit(Request $request, EntityManagerInterface $manager, NavireRepository $repo, int $id): Response {
        //$port = new Port();
        $navire = $repo->find($id);
        $form = $this->createForm(NavireType::class, $navire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($navire);
            $manager->flush();
            return $this->redirectToRoute('accueil');
        }
        return $this->render('navire/index.html.twig',
                        ['form' => $form->createView(), 'imo' => $navire->getImo(), 'mmsi' => $navire->getMmsi()
    ]);
    }

}
