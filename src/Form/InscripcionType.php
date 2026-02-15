<?php

namespace App\Form;

use App\Entity\Inscripcion;
use App\Entity\Socio;
use App\Entity\Clase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InscripcionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fecha', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de inscripción',
            ])
            ->add('socio', EntityType::class, [
                'class' => Socio::class,
                'choice_label' => function(Socio $socio) {
                    return $socio->getNombre() . ' ' . $socio->getApellido();
                },
                'placeholder' => 'Selecciona un socio',
                'label' => 'Socio',
            ])
            ->add('clase', EntityType::class, [
                'class' => Clase::class,
                'choice_label' => 'nombre',
                'placeholder' => 'Selecciona una clase',
                'label' => 'Clase',
            ])
            ->add('guardar', SubmitType::class, [
                'label' => 'Guardar inscripción',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscripcion::class,
        ]);
    }
}
