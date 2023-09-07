<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Service\SeoData;

class GaleriaController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/{localitySlug}/imagenes/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"="bariloche", "menulocal"="galeria"}, name="galeria")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     */
  public function galeriaAction(SeoData $seoData, $regionSlug, $provinceSlug, $localitySlug, $menulocal): Response
  {
    $findGaleria = $this->textoRepository->findGaleria($localitySlug);
    $titulo = 'Galería de imágenes de ' . $findGaleria[0]['lugarturistico'];
    $keywords = 'argentina galería imágenes alojamiento ' . $findGaleria[0]['lugarturistico'] . ' excursiones';
    $description = 'Galería de imágenes de ' . $findGaleria[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    return $this->render('galeria.html.twig', array(
      'findGaleria' => $findGaleria, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'coordenadasController' => $coordenadasController, 'pescacentroturistico' => $pescacentroturistico, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
