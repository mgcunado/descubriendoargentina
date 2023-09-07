<?php

namespace App\Controller;

use App\Repository\JosMenuRepository;
use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Service\SeoData;

class CentroturisticoController extends Controller
{
  private $josMenuRepository;
  private $textoRepository;

  public function __construct(JosMenuRepository $josMenuRepository, TextoRepository $textoRepository)
  {
    $this->josMenuRepository = $josMenuRepository;
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/{localitySlug}/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"="bariloche", "menulocal"=null}, name="centroturistico")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     */
  public function centroturisticoAction(Request $request, SeoData $seoData, $regionSlug, $provinceSlug, $localitySlug, $menulocal): Response
  {
    $findImagen = $this->josMenuRepository->findImagen($localitySlug);
    $findTextos = $this->textoRepository->findTextos($localitySlug);
    $titulo = $findTextos[0]['lugarturistico'];
    $keywords = 'argentina alojamiento ' . $titulo . ' excursiones distancias';
    $description = 'El centro turístico de ' . $titulo . ', en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);
    // $excursiones = null;
    // $direccionarray = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    return $this->render('centroturistico.html.twig', array(
      'findImagen' => $findImagen, 'findTextos' => $findTextos, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'menulocal' => $menulocal, 'excursiones' => null, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
