<?php

namespace App\Form;

use App\Entity\Abonnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Length;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prix', null, [
                'constraints' => [
                    new NotBlank(),          // Le champ ne doit pas être vide
                    new PositiveOrZero(),    // La valeur doit être positive ou zéro
                ],
            ])
            ->add('tabonnement', null, [
                'constraints' => [
                    new NotBlank(),          // Le champ ne doit pas être vide
                    new Length(['max' => 255]),  // La longueur maximale du champ
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}
