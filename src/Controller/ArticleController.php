<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="base_article")
     */
    public function index(): Response
    {
        return $this->render('article/base.html.twig');
    }

    /**
     * @Route("/article/{slug}", name="show_art")
     */
    public function show(): Response
    {
        return $this->render('article/showArt.html.twig');
    }
}
