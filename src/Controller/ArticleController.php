<?php

namespace App\Controller;

use PDO;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Form\ArticleFormType;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    /**
     *@IsGranted("ROLE_VENDEUR", "ROLE_ADMIN")
     *@Route("/article/create", name="article_create")
     *
     */
    public function create(Request $request, EntityManagerInterface $manager, CategorieRepository $cat){   
        $article = new Article();

        // $var=$idCat.getId();

        // $idCat = $cat->findById($var);

        // $article->setIdCat($idCat);

        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            

            foreach($article->getImageFile() as $ima){
                $ima->setArticle($article);
                $manager->persist($ima);
            }


            $manager->persist($article);
            $manager->flush();

        }
        
        // if( $request->getMethod() == 'POST' ) {
        //     $idCat->$request->get('idCat');
        //     $var=

        // }

        return $this->render('article/showArt.html.twig',[
            'art' => $article
        ]);

        return $this-> render ('article/modifArt.html.twig', [
            'form' => $form->createView()
        ]);
        
    }

    /**
     * Undocumented function
     *
     * @Route("/article/{id}/edit", name="article_edit")
     * @return void
     */
    public function edit(Article $article, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(ArticleFormType::class, $article);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($article);
            $manager->flush();
        }
        return $this->render('article/editArt.html.twig', [
            'art' => $article,
            'form' => $form->createView()
        ]);
        return $this->redirectToRoute("show_art");
        $this->addFlash(
            'success',
            "le joueur <strong>{$article->getName()}</strong> a bien été enregistrée !"
        );
    
        
    }


    /**
     * @Route("/article/{id}", name="show_art")
     * 
     */
    public function show(Article $art): Response
    {
        return $this->render('article/showArt.html.twig',[
            'art' => $art
        ]);
    }

    
}