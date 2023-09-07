<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Service\SeoData;

class ExcursionesController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/{localitySlug}/excursiones/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"="bariloche", "menulocal"="excursiones"}, name="excursiones")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     */
  public function excursionesAction(Request $request, SeoData $seoData, $regionSlug, $provinceSlug, $localitySlug, $menulocal): Response
  {
    //excursiones
    $findExcursiones = $this->textoRepository->findExcursiones($localitySlug);
    $titulo = 'Excursiones en ' . $findExcursiones[0]['lugarturistico'];
    $keywords = 'argentina excursiones paseos alojamiento ' . $findExcursiones[0]['lugarturistico'] . ' distancias';
    $description = 'Paseos y excursiones en ' . $findExcursiones[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);

    //construyendo array de existencia de archivos para pasarlo a twig a través de una variable declarada (excursiones)
    $filas = count($findExcursiones);
    $basenombreimg = $findExcursiones[0]['alias'];
    $array = array(0);

    for ($i = 1; $i < $filas + 1; $i++) {
      $nombreimg = 'images/excursiones/' . $basenombreimg . $i . '.jpg';
      if (file_exists($nombreimg)) {
        array_push($array, 1);
      } else {
        array_push($array, 0);
      }
    }
    $excursiones = $array;
    $direccionarray = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();
    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    return $this->render('excursiones.html.twig', array(
      'findExcursiones' => $findExcursiones, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'menulocal' => $menulocal, 'excursiones' => $excursiones, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
