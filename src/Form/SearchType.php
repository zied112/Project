<?php

namespace App\Form;

use App\Entity\Donneur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('type', ChoiceType::class, [

                    'choices'  => [
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',   
                        'AB+' => 'AB+',
                        'AB-' => 'AB-',
                    
                    
                    ],
                    'attr' => [
                        'label' => false,
                        'class' => 'form-select',
                        'expanded' => false,
                        'multiple' => false
                    ]
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
    
}
