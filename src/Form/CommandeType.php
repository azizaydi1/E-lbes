<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateCommande', DateType::class, [
                'label' => 'Date Commande',
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\DateTime(),
                ],
            ])
            ->add('societe', TextType::class, [
                'label' => 'Societe',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'string']),
                ],
            ])
            ->add('produitAchete', TextType::class, [
                'label' => 'Produit Achete',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'string']),
                ],
            ])
            ->add('quantite', TextType::class, [
                'label' => 'Quantite',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Callback([$this, 'validateQuantite']),
                ],
            ])
            ->add('montantTotal', MoneyType::class, [
                'label' => 'Montant Total',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])
            ->add('methPay', ChoiceType::class, [
                'label' => 'Methode de Paiement',
                'choices' => [
                    'Cash' => 'Cash',
                    'Credit Card' => 'Credit Card',
                    'Bank Transfer' => 'Bank Transfer',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'string']),
                ],
            ])
            ->add('modeLiv', ChoiceType::class, [
                'label' => 'Mode de Livraison',
                'choices' => [
                    'Standard' => 'Standard',
                    'Express' => 'Express',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'string']),
                ],
            ]);
    }

    public function validateQuantite($value, ExecutionContextInterface $context): void
    {
        // Custom validation logic for 'quantite' field
        if (!is_numeric($value)) {
            $context->buildViolation('Veuillez saisir un nombre valide pour la quantité.')
                ->addViolation();
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
