<?php
// src/Form/SocioType.php
namespace App\Form;

use App\Entity\Socio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Tipos de campo
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SocioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, ['required' => true])
            ->add('apellido', TextType::class, ['required' => true])
            ->add('email', TextType::class, ['required' => true])
            ->add('edad', IntegerType::class, ['required' => true])
            ->add('telefono', TextType::class, ['required' => true])
            ->add('fechaAlta', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('tipoMembresia', TextType::class, ['required' => true]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Socio::class,
        ]);
    }
}
