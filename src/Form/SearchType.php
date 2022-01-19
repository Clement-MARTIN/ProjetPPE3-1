<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Search;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', EntityType::class, ['class' => Categorie::class, 'choice_label' => 'name_cat',
                'label' => false,
                'attr' => ['class' => 'form-select']])
            ->add('libelle', TextType::class, ['label'=> false, 'attr'=> ['placeholder' => 'Nom article', 'required' => false] ] ); 

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
        ]);
    }
}