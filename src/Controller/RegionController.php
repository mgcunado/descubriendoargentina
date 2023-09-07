<?php

namespace App\Controller;

use App\Repository\JosMenuRepository;
use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Service\SeoData;

class RegionController extends Controller
{
  private $josMenuRepository;
  private $textoRepository;

  public function __construct(JosMenuRepository $josMenuRepository, TextoRepository $textoRepository)
  {
    $this->josMenuRepository = $josMenuRepository;
    $this->textoRepository = $textoRepository;
  }


  /**
     * @Route("/ar/{regionSlug}/", defaults={"regionSlug"="patagonia", "menulocal"=null}, name="region")
     * @param string $regionSlug
     * @param string $menulocal
     */
  public function regionAction(SeoData $seoData, $regionSlug, $menulocal): Response
  {
    //regiones
    $findImagen = $this->josMenuRepository->findImagen($regionSlug);
    $findTextos = $this->textoRepository->findTextos($regionSlug);

    $titulo = $findTextos[0]['lugarturistico'];
    $keywords = 'argentina alojamiento ' . $findTextos[0]['lugarturistico'] . ' excursiones distancias';
    $description = $findTextos[0]['lugarturistico'] . ' es una de las regiones que componen Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $findProvincesByRegion = $this->textoRepository->findProvincesByRegion($regionSlug);
    $provinceSlug = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    return $this->render('region.html.twig', array(
      'findImagen' => $findImagen, 'findTextos' => $findTextos, 'findProvincesByRegion' => $findProvincesByRegion, 'regionSlug' => $regionSlug,  'provinceSlug' => $provinceSlug,  'menulocal' => $menulocal, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
