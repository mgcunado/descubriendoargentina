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
     * @Route("/ar/{slug}/{slugg}/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"= null, "menulocal"=null}, name="provincia")
     * @param string $slugg
     * @param string $sluggg
     * @param string $menulocal
     */
  public function provinciaAction(SeoData $seoData, $slug, $slugg, $menulocal): Response
  {
    //provincias
    $ppp1 = $this->josMenuRepository->findImagen($slugg);
    $ppp2 = $this->textoRepository->findTextos($slugg);
    $titulo = 'Provincia de ' . $ppp2[0]['lugarturistico'];
    $keywords = 'argentina alojamiento provincia ' . $ppp2[0]['lugarturistico'] . ' excursiones distancias';
    $description = 'La provincia de ' . $ppp2[0]['lugarturistico'] . ' es una de las provincias de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp3 = $this->textoRepository->findTablalugares2($slugg);
    $sluggg = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    return $this->render('provincia.html.twig', array(
      'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg, 'sluggg' => $sluggg, 'menulocal' => $menulocal, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
