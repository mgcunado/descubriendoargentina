<?php

namespace App\Controller;

use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Service\SeoData;

class PescadeportivaController extends Controller
{
  private $textoRepository;

  public function __construct(TextoRepository $textoRepository)
  {
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/{localitySlug}/pescadeportiva/", defaults={"regionSlug"="patagonia", "provinceSlug"="neuquen", "localitySlug"="alumine", "menulocal"="pescadeportiva"}, name="pescadeportiva")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     */
  public function pescadeportivaAction(Request $request, SeoData $seoData, $regionSlug, $provinceSlug, $localitySlug, $menulocal): Response
  {
    //pescadeportiva
    $ppp1 = null;
    $ppp2 = $this->textoRepository->findTextos($localitySlug);
    $titulo = 'Pesca deportiva en ' . $ppp2[0]['lugarturistico'];
    $keywords = 'argentina pesca deportiva alojamiento ' . $ppp2[0]['lugarturistico'] . ' excursiones distancias';
    $description = 'La pesca deportiva en ' . $ppp2[0]['lugarturistico'] . ', uno de los cantros turísticos en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp3 = $this->textoRepository->findTablalugares2($provinceSlug);
    $menulocal = 'pescadeportiva';

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    /* Incluimos la variable de pescacentroturistico para poder pintar o no en el menu centroturistico el apartado de Pesca Deportiva */
    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    return $this->render('pescadeportiva.html.twig', array(
      'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'menulocal' => $menulocal, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
