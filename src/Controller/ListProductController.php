<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListProductController extends AbstractController
{
    /**
     * @Route("/list/product", name="list_product")
     */
    public function index(): Response
    {
        return $this->render('list_product/index.html.twig', [
            'controller_name' => 'ListProductController',
        ]);
    }
}
