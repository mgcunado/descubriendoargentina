<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Casinos;
use App\Repository\TextoRepository;
use App\Service\TransformName;
use App\Service\SeoData;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CasinosController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/casinos", defaults={"menulocal"="casinos"}, name="casinos")
     * @param $menulocal
     */
  public function casinosAction(Request $request, TransformName $transformName, SeoData $seoData, $menulocal): Response
  {
    $titulo = 'Casinos en Argentina';
    $keywords = 'argentina casinos alojamiento excursiones distancia';
    $description = 'Casinos en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp1 = $this->textoRepository->findProvinciastermas();

    $data = array('Todas' => '%');
    $i = 0;
    while ($i < count($ppp1)) {
      $datanew = array($ppp1[$i]['provincia'] => $ppp1[$i]['provincia']);
      $data = array_merge($data, $datanew);
      $i = $i + 1;
    }

    $casinos = new Casinos();

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $formulario = $this->createFormBuilder($casinos)
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
      $ppp2 = $this->textoRepository->findCasinos($provincia);
      $fotos = $transformName->doTransform($ppp2, 'casinos');

      return $this->render('casinosver.html.twig', array(
        'ppp2' => $ppp2, 'fotos' => $fotos, 'provincia' => $provincia, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
      ));
    }

    return $this->render('casinos.html.twig', array(
      'formulario' => $formulario->createView(), 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
