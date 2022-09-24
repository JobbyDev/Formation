<?php

namespace App\Form;

use App\Entity\Solevant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolevantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomination', TextType::class)
            ->add('produit', TextType::class)
            ->add('fournisseur', TextType::class)
            ->add('reference', TextType::class)
            ->add('rangement', TextType::class)
            ->add('stockReel',IntegerType::class)
            ->add('numeroDeLot', TextType::class)
            ->add('peremption', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Solevant::class,
        ]);
    }
}
