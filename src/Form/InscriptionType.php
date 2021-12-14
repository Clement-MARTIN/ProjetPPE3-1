<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
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

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, $this->getConfiguration("Email", "Entrez votre email"))
            ->add('password', PasswordType::class, $this->getConfiguration("Mot de passe","Votre mot de passe"))
            ->add('adresse', TextType::class, $this->getConfiguration("Adresse", "Votre adresse"))
            ->add('phone', TextType::class, $this->getConfiguration("Téléphone", "Votre numero de téléphone"))
            ->add('nom', TextType::class, $this->getConfiguration("Nom", "Votre nom"))
            ->add('prenom', TextType::class, $this->getConfiguration("Prenom", "Votre prénom"))
            ->add('age', IntegerType::class, $this->getConfiguration("Age", "Votre âge"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
