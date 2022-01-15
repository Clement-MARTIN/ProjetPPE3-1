<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ArticleFormType extends AbstractType
{

      /**
     * Permet d'avoir la config de base d'un champ
     * @param $label
     * @param $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder){
        return [
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ];
    }

    private function trouver(CategorieRepository $repo)
    {
        
        return $cats = $repo->findAll();
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, $this->getConfiguration("Nom de l'article:", "Donnez un nom à votre article"))
            ->add('description',TextType::class, $this->getConfiguration("Description de l'article", "donnez une description à votre article"))
            ->add('prix', NumberType::class, $this->getConfiguration("Prix de l'article:", "Donnez un prix à votre article"))
            ->add('quantite', IntegerType::class, $this->getConfiguration("Quantité de l'article:", "Donnez la quantité disponible de votre article"))
            ->add('origine',TextType::class, $this->getConfiguration("Origine de l'article:", "D'où provient votre article"))
            ->add('frais_de_port', NumberType::class, $this->getConfiguration("Frais de port de l'article:", "Donnez les frais de port de votre article"))
            ->add('filename',TextType::class, $this->getConfiguration("Nom de l'image de votre article", "Donnez un nom à votre image"))
            ->add('imageFile', FileType::class, [
                'required' => false
            ], 
            $this->getConfiguration("Images de votre article:", "Déposez ici les images en lien avec votre article"))
            ->add('idCat', EntityType::class, ['class' => Categorie::class, 'choice_label' => 'nameCat',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
