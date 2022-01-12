<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/{idCat?0}", name="homepage")
     */
    public function recentArticles(CategorieRepository $repo, $idCat,Request $req)
    {
        dump($req);
        if ($idCat != "0"){
            return $this->redirectToRoute('search', ['idCat'=>$idCat]);
        }
        $cats = $repo->findAll();

        return $this->render(
            'home.html.twig'
        );
    }
}
