<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accueil", name="accueil_")
 */
class AccueilController extends AbstractController {

    /**
     * @Route("/accueil", name="accueil_")
     */
    public function index(): Response {
        return $this->render('accueil/accueil.html.twig');
    }

}
