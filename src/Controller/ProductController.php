<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    /**
     * @Route("/add/product", name="add_product")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        //Création d'un produit
        $produit = new product();

        //Récupération du formulaire
        $form = $this->createForm(ProduitType::class,$produit);

        //Lien Objet géré par le formulaire -> Requête soumission du formulaire
        $form-> handleRequest($request);

            //si le formulaire à été soumis et est valide
            if($form->isSubmitted() && $form->isValid()){
                //enregistrement du produit dans la bdd

                $em = $this->getDoctrine()->getManager();

                $em->persist($produit);

                $em->flush();

                return new Response("Le produit à bien été ajouté à la base de donnée.");

            }

        //Génération du code HTML pour le formulaire créé
        $formView = $form->createView();

        //Affichage de la vue
        return $this->render('add_product/index.html.twig', array('form'=>$formView));

    }

    /**
     * @Route("/list/product", name="list_product")
     *
     * @return Response
     */
    public function liste_ProduitsAction(){

        // variable qui contient le dépot de la requête
        $repository = $this->getDoctrine()->getRepository('AppBundle:Produit');

        //Recuperation de la liste des produits
        $produits = $repository->findAll();

        return $this->render('list_product/index.html.twig', array('produits'=>$produits));
    }

    /**
     * @return Response
     *
     * @Route("/modification/product/{id}", name="modification_product")
     */
    public function modification(Request $request, Product $produit){

        //Récupération du formulaire
        $form = $this->createForm(ProduitType::class,$produit);//Lien Objet géré par le formulaire -> Requête soumission du formulaire
        $form-> handleRequest($request);

        //si le formulaire à été soumis et est valide
        if($form->isSubmitted() && $form->isValid()){
            //enregistrement du produit dans la bdd

            $em = $this->getDoctrine()->getManager();

            //inutile, l'objet provient de la BDD
            //$em->persist($produit);

            $em->flush();

            return new Response("Le produit à bien été modifié dans la base de donnée.");

        }

        //Génération du code HTML pour le formulaire créé
        $formView = $form->createView();

        //Affichage de la vue
        return $this->render('add_product/index.html.twig', array('form'=>$formView));
    }

    /**
     * @Route("/delete/product/{id}", name="delete_product")
     *
     * @return Response
     */
    public function suppression(Product $produit){

        // recuperation de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $em->remove($produit);
        $em->flush();

        return new Response ('Produit supprimé');
    }

}
