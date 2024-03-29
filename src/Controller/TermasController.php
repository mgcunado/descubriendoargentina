<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Termas;

use App\Service\TransformName;
use App\Service\SeoData;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TermasController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/termas", defaults={"menulocal"="termas"}, name="termas")
     * @param string $menulocal
     */
  public function termasAction(Request $request, TransformName $transformName, SeoData $seoData, $menulocal): Response
  {
    $titulo = 'Termas en Argentina';
    $keywords = 'argentina termas alojamiento excursiones distancia';
    $description = 'Termas en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp1 = $this->textoRepository->findProvinciastermas();

    $data = array('Todas' => '%');
    $i = 0;
    while ($i < count($ppp1)) {
      $datanew = array($ppp1[$i]['provincia'] => $ppp1[$i]['provincia']);
      $data = array_merge($data, $datanew);
      $i = $i + 1;
    }

    $termas = new Termas();

    $formulario = $this->createFormBuilder($termas)
    ->add('provincia', ChoiceType::class, array(
      'attr' => array('class' => 'p-2 btn btn-light cursormano'),
      'choices' => $data
    ))
    ->add('Ver Resultados', SubmitType::class, array(
      'attr' => array('class' => 'p-2 btn btn-light cursormano'),
    ))

    ->getForm();

    $formulario->handleRequest($request);

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    if ($formulario->isSubmitted()) {
      $provincia = $formulario->get('provincia')->getData();
      $findTermas = $this->textoRepository->findTermas($provincia);

      $fotos = $transformName->doTransform($findTermas);

      return $this->render('termasver.html.twig', array(
        'findTermas' => $findTermas, 'fotos' => $fotos, 'provincia' => $provincia, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
      ));
    }

    return $this->render('termas.html.twig', array(
      'formulario' => $formulario->createView(), 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
