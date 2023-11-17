<?php

namespace App\Form;

use App\Entity\Panier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class PanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateAchat', DateTimeType::class, [
                'label' => 'Date Achat',
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('societe', TextType::class, [
                'label' => 'Societe',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Callback(['callback' => [$this, 'validateString']]),
                ],
            ])
            ->add('quantite', NumberType::class, [
                'label' => 'Quantite',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])
            ->add('prixUnitaire', NumberType::class, [
                'label' => 'Prix Unitaire',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])
            ->add('montantTotal', NumberType::class, [
                'label' => 'Montant Total',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])
            ->add('produit', TextType::class, [
                'label' => 'Produit',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Callback(['callback' => [$this, 'validateString']]),
                ],
            ]);
    }

    public function validateString($value, ExecutionContextInterface $context): void
    {
        // Custom validation logic for string fields
        if (!is_string($value)) {
            $context->buildViolation('Veuillez saisir une chaîne valide.')
                ->addViolation();
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panier::class,
        ]);
    }
}
