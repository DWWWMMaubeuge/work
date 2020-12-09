<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $choices = [
            'Monsieur' => 'Monsieur',
            'Madame' => 'Madame'
        ];
 
        $builder
            ->add('Civilite', ChoiceType::class, [
                'choices' => $choices,
                'expanded' => false,  // => boutons
                'label' => 'Civilite',
            ])
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Telephone', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Objet', TextType::class)
            ->add('Message', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
