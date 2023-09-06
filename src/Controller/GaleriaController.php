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
     * @Route("/ar/{slug}/{slugg}/{sluggg}/imagenes/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"="galeria"}, name="galeria")
     * @param string $slug
     * @param string $slugg
     * @param string $sluggg
     * @param string $menulocal
     */
  public function galeriaAction(SeoData $seoData, $slug, $slugg, $sluggg, $menulocal): Response
  {
    $ppp1 = null;
    $ppp2 = $this->textoRepository->findGaleria($sluggg);
    $titulo = 'Galería de imágenes de ' . $ppp2[0]['lugarturistico'];
    $keywords = 'argentina galería imágenes alojamiento ' . $ppp2[0]['lugarturistico'] . ' excursiones';
    $description = 'Galería de imágenes de ' . $ppp2[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp3 = $this->textoRepository->findTablalugares2($slugg);

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $pescacentroturistico = $this->textoRepository->findPescadeportiva($sluggg);

    return $this->render('galeria.html.twig', array(
      'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg, 'sluggg' => $sluggg, 'coordenadasController' => $coordenadasController, 'pescacentroturistico' => $pescacentroturistico, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
