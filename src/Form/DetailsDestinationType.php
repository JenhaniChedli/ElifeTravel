<?php

namespace App\Form;

use App\Entity\DetailsDestination;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailsDestinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Hotel')
            ->add('Description')
            ->add('Duree')
            ->add('prix')
            ->add('datedepart')
            ->add('destination')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DetailsDestination::class,
        ]);
    }
}
