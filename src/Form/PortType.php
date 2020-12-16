<?php

namespace App\Form;

use App\Entity\Port;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Pays;
use App\Entity\AisShipType;
use App\Repository\PaysRepository;

class PortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
                ->add('nom', TextType::class)
                ->add('indicatif', TextType::class)
                ->add('lePays', EntityType::class, [
                    'class' => Pays::class,
                    'choice_label' => 'nom',
                    'expanded' => false,
                    'multiple' => false,
                    'query_builder' => function(PaysRepository $repo){
                    $lesPaysTries=$repo->getPaysTrieSurNom();
                    return $lesPaysTries;
                    }
                ])
                ->add('lesTypes', EntityType::class
                        ,[
                            'class' => AisShipType::class,
                            'choice_label' => 'libelle',
                            'expanded' => true,
                            'multiple' => true,
                        ]);
        ;
        }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Port::class,
        ]);
    }
}
