<?php

namespace App\Form;

use App\Entity\Tournament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'required' => true,
                'label' => 'Nom'
            ])
            ->add('is_private', CheckboxType::class, [
                'label'    => 'Rendre ce tournoi privé',
                'required' => false
            ])
            ->add('date_begin', DateTimeType::class, [
                'label' => 'Date/heure de départ du tournoi',
                'date_widget' => 'single_text'
            ])
            ->add('date_end', DateTimeType::class, [
                'required' => false,
                'label' => 'Date/heure de fin du tournoi (optionnel)',
                'date_widget' => 'single_text'
            ])
            ->add('location',TextType::class, [
                'required' => false,
                'label' => 'Lieu ou adresse de l\'évènement'
            ])
            ->add('max_gamers',IntegerType::class, [
                'required' => true,
                'label' => 'Maximum de participants (joueurs ou équipes)'
            ])
            ->add('is_free', CheckboxType::class, [
                'label'    => 'Ce tournoi est gratuit',

                'required' => false
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Prix',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
        ]);
    }
}
