<?php
// src/Form/Type/EmailenviadosType.php
namespace App\Form\Type;

use App\Entity\Emailenviados;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\GreaterThan;

//use Symfony\Component\Validator\Constraints\Expression;

//use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class EmailenviadosType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
      $builder
         ->add('direcciones', CollectionType::class, array(
         'entry_type' => AlojamientosType::class,
         'entry_options' => array('label' => false),
      ))
            ->add('nombre', TextType::class, array(
                'label' => 'Nombre:',
                'mapped'   => false
               ))
            ->add('telefono', TextType::class, array(
                'label' => 'Teléfono:',
                'required' => false,
            'attr' => array('class' => 'ml-1'),
                'mapped'   => false
               ))
            ->add('email', EmailType::class, array(
                'label' => 'Email:',
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new Email(array(
                   'message' => 'El valor introducido, {{ value }}, no es un email válido.',
                   'checkMX' => true
                  )),
             'attr' => array('size' => 40),
                'mapped'   => false
               ))
               ->add('fechallegada', DateType::class, array(
                  'label' => 'Fecha de llegada:',
                  'widget' => 'single_text',
                  'format' => 'd/M/y',
                  'data' => new \DateTime(),
                  'required' => true,
                  'constraints' => new GreaterThanOrEqual(array(
                     'value' => 'today',
                     'message' => 'La fecha de llegada no es correcta. Es anterior a hoy.'
                  )),
                   'mapped'   => false
               ))
            ->add('fechasalida', DateType::class, array(
                'label' => 'Fecha de salida:',
                'widget' => 'single_text',
                'format' => 'd/M/y',
                'data' => new \DateTime('tomorrow'),
                'required' => true,
                  'constraints' => new GreaterThanOrEqual(array(
                     'value' => 'tomorrow',
                     'message' => 'La fecha de salida no es correcta. Es anterior a mañana.'
                  )),
                  /*'constraints' => new GreaterThan(array(
                     'value' => fechallegada,
                     'message' => 'La fecha de llegada no puede ser posterior o igual a la fecha de salida.'
                  )),*/
                 /* 'constraints' => new Expression(array(
                    'value >= this.fechallegada',
                     'message' => 'La fecha de llegada no puede ser posterior o igual a la fecha de salida.'
                  )),*/
                'mapped'   => false
               ))
            ->add('pasajeros', IntegerType::class, array(
                'label' => 'Pasajeros:',
                'data' => 2,
                'required' => true,
            'attr' => array('min' => 1, 'max' => 10, 'style' => 'width: 60px'),
                'mapped'   => false
               ))
            ->add('consulta', TextareaType::class, array(
                'label' => 'Consulta:',
                'required' => true,
             'attr' => array('rows' => 4, 'cols' => 40, 'style' => 'vertical-align: top'),
                'mapped'   => false
               ))
             ->add('controlspam', TextType::class, array(
                'label' => 'Control:',
                'required' => false,
               'mapped'   => false
               ))
            ->add('Enviar', SubmitType::class)
      ;
   }

   public function configureOptions(OptionsResolver $resolver)
   {
      $resolver->setDefaults(array(
         'data_class' => Emailenviados::class,
          //la siguiente línea evita el error: 'This form should not contain extra fields'
         'allow_extra_fields' => true
      ));
   }

   public function getBlockPrefix()
   {
      return null;
   }

}
