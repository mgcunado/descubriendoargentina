<?php
// src/Form/Type/AlojamientosType.php
namespace App\Form\Type;

use App\Entity\Alojamientos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AlojamientosType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
      //$builder->add('email', null, array('label' => false));
      $builder->add('enviado', CheckboxType::class, array('label' => false));         
   }

   public function configureOptions(OptionsResolver $resolver)
   {
      $resolver->setDefaults(array(
         'data_class' => Alojamientos::class,
      ));
   }

   public function getBlockPrefix()
   {
      return null;
   }
}
