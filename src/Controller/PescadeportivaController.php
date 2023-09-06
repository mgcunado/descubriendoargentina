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
     * @Route("/ar/{slug}/{slugg}/{sluggg}/pescadeportiva/", defaults={"slug"="patagonia", "slugg"="neuquen", "sluggg"="alumine", "menulocal"="pescadeportiva"}, name="pescadeportiva")
     * @param string $slug
     * @param string $slugg
     * @param string $sluggg
     * @param string $menulocal
     */
  public function pescadeportivaAction(Request $request, SeoData $seoData, $slug, $slugg, $sluggg, $menulocal): Response
  {
    //pescadeportiva
    $ppp1 = null;
    $ppp2 = $this->textoRepository->findTextos($sluggg);
    $titulo = 'Pesca deportiva en ' . $ppp2[0]['lugarturistico'];
    $keywords = 'argentina pesca deportiva alojamiento ' . $ppp2[0]['lugarturistico'] . ' excursiones distancias';
    $description = 'La pesca deportiva en ' . $ppp2[0]['lugarturistico'] . ', uno de los cantros turísticos en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp3 = $this->textoRepository->findTablalugares2($slugg);
    $menulocal = 'pescadeportiva';

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    /* Incluimos la variable de pescacentroturistico para poder pintar o no en el menu centroturistico el apartado de Pesca Deportiva */
    $pescacentroturistico = $this->textoRepository->findPescadeportiva($sluggg);

    return $this->render('pescadeportiva.html.twig', array(
      'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg, 'sluggg' => $sluggg, 'menulocal' => $menulocal, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
