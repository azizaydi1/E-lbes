<?php

namespace App\Form;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le nom ne peut pas être vide.',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('patente', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le numéro de patente ne peut pas être vide.',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le numéro de patente ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('siege', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'L\'adresse du siège social ne peut pas être vide.',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'L\'adresse du siège social ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('tel', TelType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le numéro de téléphone ne peut pas être vide.',
                    ]),
                    new Regex([
                        'pattern' => '/^[2-5|7|9]/', // Expression régulière pour vérifier les premiers chiffres
                        'message' => 'Le numéro de téléphone doit commencer par 2, 3, 4, 5, 7 ou 9.',
                    ]),
                ],
            ])
            ->add('dabonnement', IntegerType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'La durée d\'abonnement ne peut pas être vide.',
                    ]),
                ],
            ])
            ->add('datedebut', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date de début ne peut pas être vide.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
