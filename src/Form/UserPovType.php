<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class UserPovType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $eventDate = new \DateTime();

        $builder
            ->add('content',TextareaType::class,[
                'label' => 'votre avis',
            ])
            ->add('moment', DateType::class, [
                'widget' => 'single_text', // Utiliser un seul champ de saisie pour la date
                'data' => new \DateTime(), // Valeur par défaut (date actuelle)
                'format' => 'yyyy-MM-dd',  // Format de la date attendu

            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
