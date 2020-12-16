<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;

/**
 * @Route("/aisshiptype", name="aisshiptype_")
 */
class AisShipTypeController extends AbstractController
{
    /**
     * @Route("/ais/ship/type", name="ais_ship_type")
     */
    public function index(): Response
    {
        return $this->render('ais_ship_type/index.html.twig', [
            'controller_name' => 'AisShipTypeController',
        ]);
    }
    
    /**
     * @Route("/voirtous", name="voirtous")
     */
    public function voirTous(AisShipTypeRepository $repo): Response{
        $types = $repo->findAll();
        return $this->render('aisshiptype/voirtous.html.twig', [
            'types' => $types,
        ]);
    }
    
    /**
     * @Route("/portcompatible/{id}", name="port")
     */
    public function portcompatible(){
        
    }
}
