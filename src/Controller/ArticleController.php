<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/article/search", name="search")
     * 
     */
    public function search(ArticleRepository $repo, Request $request): Response
    {
        $idCat= $request->get('cat');
        $name= $request->get('name');
        $article= $repo -> Search($idCat, $name);
        return $this->render('article/search.html.twig', [
            'arts' =>  $article
        ]);
    }

    /**
     * @Route("/article/{slug}", name="show_art")
     * 
     */
    public function show(Article $art): Response
    {
        return $this->render('article/showArt.html.twig',[
            'art' => $art
        ]);
    }
    
}
