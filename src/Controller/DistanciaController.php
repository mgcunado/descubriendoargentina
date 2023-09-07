<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Service\SeoData;

class DistanciaController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/{localitySlug}/distancias/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"="bariloche", "menulocal"="distancias"}, name="distancias")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     */
  public function distanciaAction(Request $request, SeoData $seoData, $regionSlug, $provinceSlug, $localitySlug, $menulocal): Response
  {
    //tabla de distancias
    $findTabladistancias1 = $this->textoRepository->findTabladistancias1($localitySlug);
    $titulo = 'Cuadro de distancias desde ' . $findTabladistancias1[0]['lugarturistico'];
    $keywords = 'argentina tabla distancias localidades cercanas alojamiento ' . $findTabladistancias1[0]['lugarturistico'] . ' excursiones';
    $description = 'Tabla de distancias en linea recta desde ' . $findTabladistancias1[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $latitud1 = $findTabladistancias1[0]['latitud'];
    $longitud1 = $findTabladistancias1[0]['longitud'];

    $findTabladistancias2 = $this->textoRepository->findTabladistancias2($localitySlug, $latitud1, $longitud1);
    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);
    $filas = count($findTabladistancias2);

    /************************/
    $direccionarray = array();
    $i = 0;
    while ($i < $filas) {
      $latitud2 = $findTabladistancias2[$i]['latitud'];
      $longitud2 = $findTabladistancias2[$i]['longitud'];
      $dirNS = $latitud2 - $latitud1;
      $dirEO = $longitud2 - $longitud1;
      //para evitar el error: Warning: Division by zero
      if ($dirEO == 0) {
        $dirEO = 0.01;
      }
      $dirGLOBAL = $dirNS / $dirEO;

      if ($dirGLOBAL <= tan(22.5 * 0.01745329252) && $dirGLOBAL >= tan(-22.5 * 0.01745329252) && $dirEO > 0) {
        $direccion = "E";
      } elseif ($dirGLOBAL > tan(22.5 * 0.01745329252) && $dirGLOBAL < tan(67.5 * 0.01745329252) && $dirNS > 0 && $dirEO > 0) {
        $direccion = "NE";
      } elseif (($dirGLOBAL >= tan(67.5 * 0.01745329252) || $dirGLOBAL <= tan(112.5 * 0.01745329252)) && $dirNS > 0) {
        $direccion = "N";
      } elseif ($dirGLOBAL > tan(112.5 * 0.01745329252) && $dirGLOBAL < tan(157.5 * 0.01745329252) && $dirNS > 0) {
        $direccion = "NO";
      } elseif ($dirGLOBAL >= tan(157.5 * 0.01745329252) && $dirGLOBAL <= tan(202.5 * 0.01745329252) && $dirEO < 0) {
        $direccion = "O";
      } elseif ($dirGLOBAL > tan(202.5 * 0.01745329252) && $dirGLOBAL < tan(247.5 * 0.01745329252) && $dirNS < 0 && $dirEO < 0) {
        $direccion = "SO";
      } elseif (($dirGLOBAL >= tan(247.5 * 0.01745329252) || $dirGLOBAL <= tan(292.5 * 0.01745329252)) && $dirNS < 0) {
        $direccion = "S";
      } elseif ($dirGLOBAL > tan(292.5 * 0.01745329252) && $dirGLOBAL < tan(-22.5 * 0.01745329252) && $dirNS < 0) {
        $direccion = "SE";
      }

      $datanew = array($direccion);
      $direccionarray = array_merge($direccionarray, $datanew);
      $i = $i + 1;
    }

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    return $this->render('distancia.html.twig', array(
      'findTabladistancias1' => $findTabladistancias1, 'findTabladistancias2' => $findTabladistancias2, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'menulocal' => $menulocal, 'direccionarray' => $direccionarray, 'excursiones' => null, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
