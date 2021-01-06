<?php

namespace App\Form;

use App\Entity\Navire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\AisShipType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class NavireType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('imo', TextType::class)
                ->add('nom', TextType::class)
                ->add('mmsi', TextType::class)
                ->add('indicatifAppel', TextType::class)
                ->add('Longueur')
                ->add('Largeur')
                ->add('tirandeau')
                ->add('leType', EntityType::class
                        ,[
                            'class' => AisShipType::class,
                            'choice_label' => 'libelle',
                            'expanded' => false,
                            'multiple' => false,
                        ])
                ->add('eta', DateTimeType::class, [
                    'placeholder' => ['months' => 'Months', 'days' => 'Days', 'years' => 'Years', 'hours' => 'Hours', 'minutes' => 'Minutes']
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Navire::class,
        ]);
    }

}
