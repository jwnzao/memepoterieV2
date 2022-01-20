<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitTypeController extends AbstractController
{
    /**
     * @Route("/produit/type", name="produit_type")
     */
    public function index(): Response
    {
        return $this->render('produit_type/index.html.twig', [
            'controller_name' => 'ProduitTypeController',
        ]);
    }
}
