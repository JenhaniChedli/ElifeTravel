<?php

namespace App\Form;

use App\Entity\Destination;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DestinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville')
            ->add('pays')
            ->add('photoFile', FileType::class, [
                'mapped' => false
            ])
            ->add('description')
            ->add('Hotel')
            ->add('Duree')
            ->add('Prix')
            ->add('datedepart', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Date d’achat (JJ/MM/AAAA)*',
                'format' => 'yyyy-MM-dd',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Destination::class,
        ]);
    }
}
