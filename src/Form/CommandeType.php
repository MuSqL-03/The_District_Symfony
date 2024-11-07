<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantity',
                'attr' => ['min' => 1, 'value' => 1],
            ])
            ->add('nomClient', TextType::class, [
                'label' => 'Your Name',
            ])
            ->add('telephoneClient', TextType::class, [
                'label' => 'Phone',
            ])
            ->add('emailClient', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('adresseClient', TextType::class, [
                'label' => 'Address',
            ])
            ->add('save', SubmitType::class, ['label' => 'Place Order']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}