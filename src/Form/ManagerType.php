<?php

namespace App\Form;

use App\Entity\Manager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ManagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Prénom Nom',
                'disabled' => true
            ])
            ->add('username',TextType::class, [
                'label' => 'Pseudo',
                'constraints' => [
                    new Length([
                        'max' => 180
                    ])
                ]
            ])
            ->add('email',TextType::class, [
                'label' => 'Email',
                'required' => true,
                'constraints' => [
                    new Length([
                    'max' => 180
                    ])
                ]
            ])
            // ->add('plainPassword', PasswordType::class)
            ->add('submit', submitType::class, [
                'label' => 'Modifier mon profil',
                'attr' => ['class' => 'lobster btn btn-lg btn-perso5 my-2 col align-self-center']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Manager::class,
        ]);
    }
}
