<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisation.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un email',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisation.',
                    ]),
                ],
            ])
            ->add('isSuperUser', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Vous souhaitez apparaître dans notre annuaire ?',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'id' => 'isSuperUser',
                    'onchange' => 'toggleShopFields()',
                ],
            ])
            // Champs conditionnels pour la boutique en ligne
            ->add('activityName', TextType::class, [
                'mapped' => false,
                'label' => 'Nom de votre activité',
                'required' => false,
                'attr' => [
                    'class' => 'form-control shop-field', 
                ],
            ])
            ->add('activityDescription', TextareaType::class, [
                'mapped' => false,
                'label' => 'Description de votre activité',
                'required' => false,
                'attr' => [
                    'class' => 'form-control shop-field',
                    'rows' => 3,
                ],
            ])
            ->add('activityCategory', ChoiceType::class, [
                'mapped' => false,
                'label' => 'Catégorie de votre boutique',
                'required' => false,
                'choices' => [
                    'Restaurant' => 'restaurant',
                    'Commerce' => 'commerce',
                    'Service' => 'service',
                    'Association' => 'association',
                    'Artisan' => 'artisan',
                    'Autre' => 'autre',
                ],
                'attr' => [
                    'class' => 'form-select shop-field',  
                ],
            ])
            ->add('superUserAgreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Vous acceptez nos conditions d\'utilisation en tant qu\'exposant?',
                'required' => false,
            ])
            
            ->add('hasOnlineShop', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Vous voulez nous confier des articles à vendre ?',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'id' => 'hasOnlineShop',
                    'onchange' => 'toggleShopFields()',
                ],
            ])
            ->add('shopAgreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Vous acceptez nos conditions d\'utilisation de notre système de boutique en ligne?',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
