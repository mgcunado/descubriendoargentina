<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Service\SeoData;

class ApctaController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/principalescentrosturisticos", defaults={"menulocal"="principalescentrosturisticos"}, name="principalescentrosturisticos")
     * @param SeoData $seoData
     * @param string $menulocal
     * @return Response
     */
  public function apctaAction(SeoData $seoData, $menulocal): Response
  {
    // $em = $this->getDoctrine()->getManager();

    $titulo = 'Alojamiento en los principales Centros Turísticos de Argentina';
    $keywords = 'argentina alojamiento principales centros turismo turistico';
    $description = $titulo;

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $alojamientosprincipales = $this->textoRepository->findAlojamientosprincipales();

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();


    return $this->render('principalescentrosturisticos.html.twig', array(
      'alojamientosprincipales' => $alojamientosprincipales, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'seoPage' => $seoPage
    ));
  }

  /**
     * @Route("/mapainteractivo/{region}", defaults={"region"= null, "menulocal"="mapainteractivo"}, name="mapainteractivo")
     * @param SeoData $seoData
     * @param string $menulocal
     * @param string $region
     * @return Response
     */
  public function mapainteractivoAction(SeoData $seoData, $region, $menulocal)
  {
    // $em = $this->getDoctrine()->getManager();

    $titulo = ($region == null || $region == 'argentina') ? 'Mapa interactivo de Alojamiento en Argentina' : 'Mapa interactivo de Alojamiento en región ' . $region;

    $keywords = 'argentina alojamiento mapa interactivo principales centros turismo turistico';
    $description = $titulo;

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $alojamientosfaltantes = array('melincue', 'choelechoel', 'riocolorado', 'islamartingarcia', 'eltigre', 'montehermoso', 'reta', 'lastoninas', 'costachica', 'nuevaatlantis', 'jacintoarauz', 'parqueprovincialaconcagua', 'nacunan', 'villavicencio', 'volcantupungato', 'valledelaluna', 'cerroalcazar', 'cerromercedario', 'embalsequebradadeullum', 'reservadelabiosferasanguillermo', 'reservadelvallefertil', 'pasodelospatos', 'parquenacionalchaco', 'parqueprovincialpampadelindio', 'esterosdelibera', 'parquenacionalriopilcomayo', 'banadodelaestrella', 'lagunayema', 'reservanaturalformosa', 'lagunabrava', 'diquedelossauces', 'cerrodelacruz', 'diquelosquiroga', 'parqueprovincialcopo', 'laboca', 'venadotuerto', 'coronda', 'victorica', 'sancarloscentro', 'campodelcielo', 'sanfranciscodelaishi', 'pobladosypaisajesdelapuna', 'fiambala', 'parquezoologico', 'lasflores', 'lobos', 'colonia25demayo', 'intendentealvear');


    $resultalojamientosprincipales = $this->textoRepository->findAlojamientosprincipales2($region, $alojamientosfaltantes);

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    return $this->render('mapainteractivo.html.twig', array(
      'region' => $region, 'coordenadasController' => $coordenadasController, 'resultalojamientosprincipales' => $resultalojamientosprincipales, 'menulocal' => $menulocal, 'seoPage' => $seoPage
    ));
  }
}
