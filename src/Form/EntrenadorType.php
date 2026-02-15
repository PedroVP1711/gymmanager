<?php

// src/Form/EntrenadorType.php
namespace App\Form;

use App\Entity\Entrenador;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EntrenadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, ['label' => 'Nombre'])
            ->add('email', EmailType::class, ['label' => 'Correo electrónico'])
            ->add('apellido',TextType::class, ['label' => 'Apellidos'])
            ->add('telefono', IntegerType::class, ['label' => 'Número'])
            ->add('especialidad', TextType::class, ['label' => 'Especialidad']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entrenador::class,
        ]);
    }
}
