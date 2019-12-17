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
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Mot de passe (min 6 caractères)'),
                'second_options' => array('label' => 'Répétez le mot de passe'),
                'constraints' => [
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096
                    ])
                ]
            ])
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
