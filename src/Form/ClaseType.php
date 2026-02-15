<?php

namespace App\Form;

use App\Entity\Clase;
use App\Entity\Entrenador;
use App\Entity\Socio;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // <--- Asegúrate de esto

class ClaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('tipo', TextType::class)
            ->add('hora', TimeType::class)
            ->add('entrenador', EntityType::class, [
                'class' => Entrenador::class,
                'choice_label' => function(Entrenador $entrenador) {
                    return $entrenador->getNombre() . ' ' . $entrenador->getApellido();
                },
                'placeholder' => 'Selecciona un entrenador',
                'label' => 'Entrenador',
            ])
            ->add('guardar', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clase::class,
        ]);
    }
}
