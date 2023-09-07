<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Rutadelvino;

use App\Service\TransformName;
use App\Service\SeoData;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RutadelvinoController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/rutadelvino", defaults={"menulocal"="rutadelvino"}, name="rutadelvino")
     * @param string $menulocal
     */
  public function rutadelvinoAction(Request $request, TransformName $transformName, SeoData $seoData, $menulocal): Response
  {
    $titulo = 'Ruta del Vino en Argentina';
    $keywords = 'argentina ruta vino alojamiento excursiones distancia';
    $description = 'Ruta del vino en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $findProvinciastermas = $this->textoRepository->findProvinciastermas();

    $data = array('Todas' => '%');
    $i = 0;
    while ($i < count($findProvinciastermas)) {
      $datanew = array($findProvinciastermas[$i]['provincia'] => $findProvinciastermas[$i]['provincia']);
      $data = array_merge($data, $datanew);
      $i = $i + 1;
    }

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $rutadelvino = new Rutadelvino();

    $formulario = $this->createFormBuilder($rutadelvino)
    ->add('provincia', ChoiceType::class, array(
      'attr' => array('class' => 'p-2 btn btn-light cursormano'),
      'choices' => $data
    ))
    ->add('Ver Resultados', SubmitType::class, array(
      'attr' => array('class' => 'p-2 btn btn-light cursormano'),
    ))
    ->getForm();

    $formulario->handleRequest($request);

    if ($formulario->isSubmitted()) {
      $provincia = $formulario->get('provincia')->getData();
      $findRutadelvino = $this->textoRepository->findRutadelvino($provincia);

      $fotos = $transformName->doTransform($findRutadelvino);

      return $this->render('rutadelvinover.html.twig', array(
        'findRutadelvino' => $findRutadelvino, 'fotos' => $fotos, 'provincia' => $provincia, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
      ));
    }

    return $this->render('rutadelvino.html.twig', array(
      'formulario' => $formulario->createView(), 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
