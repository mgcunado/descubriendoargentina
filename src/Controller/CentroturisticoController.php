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
     * @Route("/ar/{slug}/{slugg}/{sluggg}/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"=null}, name="centroturistico")
     * @param string $slug
     * @param string $slugg
     * @param string $sluggg
     * @param string $menulocal
     */
  public function centroturisticoAction(Request $request, SeoData $seoData, $slug, $slugg, $sluggg, $menulocal): Response
  {
    $ppp1 = $this->josMenuRepository->findImagen($sluggg);
    $ppp2 = $this->textoRepository->findTextos($sluggg);
    $titulo = $ppp2[0]['lugarturistico'];
    $keywords = 'argentina alojamiento ' . $titulo . ' excursiones distancias';
    $description = 'El centro turístico de ' . $titulo . ', en Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp3 = $this->textoRepository->findTablalugares2($slugg);
    // $excursiones = null;
    // $direccionarray = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    $pescacentroturistico = $this->textoRepository->findPescadeportiva($sluggg);

    return $this->render('centroturistico.html.twig', array(
      'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg, 'sluggg' => $sluggg, 'menulocal' => $menulocal, 'excursiones' => null, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
