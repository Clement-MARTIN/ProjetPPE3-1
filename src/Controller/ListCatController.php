<?php

namespace App\Controller;

use App\Entity\Search;
use App\Entity\Article;
use App\Form\SearchType;
use App\Entity\Categorie;
use App\Form\NewArticleType;
use App\Form\PropertySearchType;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListCatController extends AbstractController
{
    public function recentArticles(CategorieRepository $repo, Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $cat = $search -> getCategorie() ;
            $cat2 = $cat -> getId();

            $name = $search -> getLibelle();
            return $this->redirectToRoute('search', ['cat' => $cat2 , 'name' => $name] );
        }
        
        $cats = $repo->findAll();
        return $this->render('partials/header.html.twig', ['cats'=> $cats,
            'form' => $form->createView()]);
    
    }

}


