<?php

namespace App\Controller;

use PDO;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Form\ArticleFormType;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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

    // /**
    //  * @Route("/article/search", name="search")
    //  * 
    //  */
    // public function search(Request $request){
    //     return $this-> render('search/');
    // }

    /**
     * @Route("/article/search", name="search")
     * 
     */
    public function search(ArticleRepository $repo, int $idCat, string $name): Response
    {
        $idCat= $this->get('cat.id');
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
