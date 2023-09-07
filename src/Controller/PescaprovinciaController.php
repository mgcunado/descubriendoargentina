<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Service\SeoData;

class PescaprovinciaController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/pescadeportiva/provincia/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"= null, "menulocal"="pescadeportivaprovincia"}, name="pescadeportivaprovincia")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $menulocal
     */
  public function pescaprovinciaAction(SeoData $seoData, $regionSlug, $provinceSlug, $menulocal): Response
  {
    //pescadeportivaprovincias
    $findTextos = $this->textoRepository->findTextos($provinceSlug);
    $titulo = 'Pesca deportiva en la provincia de ' . $findTextos[0]['lugarturistico'];
    $keywords = 'argentina pesca deportiva provincia ' . $findTextos[0]['lugarturistico'] . ' alojamiento excursiones distancias';
    $description = 'La pesca deportiva en la provincia de ' . $findTextos[0]['lugarturistico'];

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);

    $pescaprovincia = $this->textoRepository->findPescaprovincias($provinceSlug);
    $menulocal = 'pescadeportivaprovincia';
    $localitySlug = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    return $this->render('pescaprovincia.html.twig', array(
      'findTextos' => $findTextos, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'menulocal' => $menulocal, 'pescaprovincia' => $pescaprovincia, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
