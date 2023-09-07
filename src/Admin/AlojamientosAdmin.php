<?php
// src/Admin/AlojamientosAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 

use App\Entity\Alojamientos;

class AlojamientosAdmin extends AbstractAdmin
{

  public $supportsPreviewMode = true;   

  protected function configureFormFields(FormMapper $formMapper): void
  {
    // $listaprovincias = array('Buenos Aires' => 'Buenos Aires', 'Córdoba' => 'Córdoba', 'Santa Fe' => 'Santa Fe', 'Salta' => 'Salta');

    //Apunte importante: Con las siguientes 2 líneas accedemos a BBDD a través de los Repository sin necesidad de los Controller
    $container = $this->getConfigurationPool()->getContainer();
    $em = $container->get('doctrine.orm.entity_manager');

    $findProvincias = $em->getRepository('App:Alojamientos')->findProvincias(); 
    $filas = count($findProvincias);
    $dataprovincias = array();
    $i = 0;
    while ($i < $filas) {
      $datanew = array($findProvincias[$i]['provincia'] => $findProvincias[$i]['provincia']);
      $dataprovincias = array_merge($dataprovincias, $datanew);
      $i = $i +1;
    }

    $findTipos = $em->getRepository('App:Alojamientos')->findTipos(); 
    $filas = count($findTipos);
    $datatipos = array();
    $i = 0;
    while ($i < $filas) {
      $datanew = array($findTipos[$i]['tipo'] => $findTipos[$i]['tipo']);
      $datatipos = array_merge($datatipos, $datanew);
      $i = $i +1;
    }

    $findCategorias = $em->getRepository('App:Alojamientos')->findCategorias(); 
    $filas = count($findCategorias);
    $datacategorias = array();
    $i = 0;
    while ($i < $filas) {
      $datanew = array($findCategorias[$i]['categoria'] => $findCategorias[$i]['categoria']);
      $datacategorias = array_merge($datacategorias, $datanew);
      $i = $i +1;
    }
    $datacategorias = array_merge($datacategorias, array('sin categoría' => ''));

    $findBarrios = $em->getRepository('App:Alojamientos')->findBarrios(); 
    $filas = count($findBarrios);
    $databarrios = array();
    $i = 0;
    while ($i < $filas) {
      $datanew = array($findBarrios[$i]['barrio'] => $findBarrios[$i]['barrio']);
      $databarrios = array_merge($databarrios, $datanew);
      $i = $i +1;
    }


    $formMapper
    ->with('Datos requeridos',
      array(
        'class'       => 'col-md-6',
        'box_class'   => 'box box-solid box-danger')
    )

    ->add('nombre', TextType::class)
    ->add('direccion', TextType::class)
    ->add('telefono', TextType::class)
    ->add('email', EmailType::class)
    ->add('tipo', ChoiceType::class, array(
      'choices'  => $datatipos
    ))
    ->add('categoria', ChoiceType::class, array(
      'choices'  => $datacategorias
    ))
    ->add('localidad', TextType::class)

    /* no funciona ninguna ModelType::class ya que necesita una relación @ORM\OneToMany o @ORM\ManyToOne entre las entidades relacionadas para listar las provincias */
    /*        ->add('provincia', ModelType::class, array(
              'class' => PescaDeportiva::class,
              'property' => 'provincia', 'required' => false
           ))*/

    ->add('provincia', ChoiceType::class, array(
      'choices'  => $dataprovincias
    ))
    ->end()

    ->with('Datos extra',
      array(
        'class'       => 'col-md-6',
        'box_class'   => 'box box-primary')
    )
    ->add('sitioweb', TextType::class, array('required' => false))
    ->add('barrio', ChoiceType::class, array(
      'choices'  => $databarrios, 'required' => false, 'help' => '<div style="color:red">(Sólo para Capital Federal)</div>'))

    //->add('insertado', DateType::class, array('widget' => 'choice', 'format' => 'd MMMM yyyy', 'attr' => ['locale' => 'es', 'view_timezone' => 'Europe/Madrid'],'choice_translation_domain' => true, 'data' => new \DateTime('now')))
    //->add('enviado', IntegerType::class, array('data' => 0))
    //->add('codigoerror', IntegerType::class, array('data' => '0'))

    ->end()
    ;

  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
    ->add('nombre')
    ->add('localidad')
    ->add('tipo')
    ->add('categoria')
    ;
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
    ->addIdentifier('nombre')
    ->add('localidad')
    ->add('provincia')
    ->add('tipo')
    ->add('categoria')
    ;
  }

  public function toString($object)
  {
    return $object instanceof Alojamientos
      ? $object->getNombre()
      : 'Alojamientos'; // shown in the breadcrumb on the create view
  }   
}
