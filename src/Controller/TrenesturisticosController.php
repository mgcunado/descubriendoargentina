<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Trenesturisticos;

use App\Service\TransformName;
use App\Service\SeoData;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TrenesturisticosController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/trenesturisticos", defaults={"menulocal"="trenesturisticos"}, name="trenesturisticos")
     * @param string $menulocal
     */
  public function trenesturisticosAction(Request $request, TransformName $transformName, SeoData $seoData, $menulocal): Response
  {
    $titulo = 'Trenes Turísticos en Argentina';
    $keywords = 'argentina trenes turísticos alojamiento excursiones distancia';
    $description = 'Trenes turísticos en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $findProvinciastrenesturisticos = $this->textoRepository->findProvinciastrenesturisticos();

    $data = array('Todas' => '%');
    $i = 0;

    while ($i < count($findProvinciastrenesturisticos)) {
      $datanew = array($findProvinciastrenesturisticos[$i]['provincia'] => $findProvinciastrenesturisticos[$i]['provincia']);
      $data = array_merge($data, $datanew);
      $i = $i + 1;
    }

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $trenesturisticos = new Trenesturisticos();

    $formulario = $this->createFormBuilder($trenesturisticos)
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
      $findProvinciastrenesturisticos = $this->textoRepository->findTrenesturisticos($provincia);

      $fotos = $transformName->doTransform($findProvinciastrenesturisticos, 'trenes');

      return $this->render('trenesturisticosver.html.twig', array(
        'findProvinciastrenesturisticos' => $findProvinciastrenesturisticos, 'fotos' => $fotos, 'provincia' => $provincia, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
      ));
    }

    return $this->render('trenesturisticos.html.twig', array(
      'formulario' => $formulario->createView(), 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
