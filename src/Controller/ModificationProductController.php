<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModificationProductController extends AbstractController
{
    /**
     * @Route("/modification/product", name="modification_product")
     */
    public function index(): Response
    {
        return $this->render('modification_product/index.html.twig', [
            'controller_name' => 'ModificationProductController',
        ]);
    }
}
