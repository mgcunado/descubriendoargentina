<?php

namespace App\Controller;

use App\Repository\JosMenuRepository;
use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Service\SeoData;

class ProvinciaController extends Controller
{
  private $josMenuRepository;
  private $textoRepository;

  public function __construct(JosMenuRepository $josMenuRepository, TextoRepository $textoRepository)
  {
    $this->josMenuRepository = $josMenuRepository;
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"= null, "menulocal"=null}, name="provincia")
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     */
  public function provinciaAction(SeoData $seoData, $regionSlug, $provinceSlug, $menulocal): Response
  {
    //provincias
    $findImagen = $this->josMenuRepository->findImagen($provinceSlug);
    $findTextos = $this->textoRepository->findTextos($provinceSlug);
    $titulo = 'Provincia de ' . $findTextos[0]['lugarturistico'];
    $keywords = 'argentina alojamiento provincia ' . $findTextos[0]['lugarturistico'] . ' excursiones distancias';
    $description = 'La provincia de ' . $findTextos[0]['lugarturistico'] . ' es una de las provincias de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);
    $localitySlug = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    return $this->render('provincia.html.twig', array(
      'findImagen' => $findImagen, 'findTextos' => $findTextos, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'menulocal' => $menulocal, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
