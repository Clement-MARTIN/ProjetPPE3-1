<?php

namespace App\Controller;

use PDO;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\ArticleRepository;
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
            'arts' => $arts
        ]);
    }

    /**
     * @Route("/article/{slug}", name="show_art")
     * 
     */
    public function show($slug, Article $art, Categorie $cat): Response
    {

        $db = new PDO('mysql:host=serverbtssiojv.ddns.net;dbname=tchahangying_ppe3-projet1', 'tchahangying', 'tchahangying');
        $sqlQuery = 'SELECT c.nameCat
                     FROM Categorie c, Article a
                     WHERE a.id_cat_id = c.idCat';
                     
        // foreach ($conn->query($sqlQuery) as $res)
        // {

        // }

        return $this->render('article/showArt.html.twig',[
            'art' => $art,
            'cat' => $cat
        ]);
    }
}
