<?php

namespace App\Controller;

use PDO;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="base_article")
     */
    public function index(ArticleRepository $repo): Response
    {
        $arts = $repo->findAll();

        return $this->render('article/base.html.twig', [
            'arts' => $arts, 
        ]);
    }

    /**
     * @Route("/article/{slug}", name="show_art")
     * 
     */
<<<<<<< HEAD
    public function show(Article $art): Response
=======
    public function show($slug, Article $art): Response
>>>>>>> f087bd576ca3b1bde47d3dd24907100ffe9e38da
    {

        

        return $this->render('article/showArt.html.twig',[
            'art' => $art
        ]);
    }
}
