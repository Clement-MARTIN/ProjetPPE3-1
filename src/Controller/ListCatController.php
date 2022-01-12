<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ListCatController extends AbstractController
{
    public function recentArticles(CategorieRepository $repo): Response
    {
        $cats = $repo->findAll();
        return $this->render('partials/header.html.twig', ['cats'=> $cats]);
    }
}


