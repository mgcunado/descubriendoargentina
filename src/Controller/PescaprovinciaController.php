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
     * @Route("/ar/{slug}/{slugg}/pescadeportiva/provincia/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"= null, "menulocal"="pescadeportivaprovincia"}, name="pescadeportivaprovincia")
     * @param string $slug
     * @param string $slugg
     * @param string $menulocal
     */
  public function pescaprovinciaAction(SeoData $seoData, $slug, $slugg, $menulocal): Response
  {
    //pescadeportivaprovincias
    $ppp1 = null;
    $ppp2 = $this->textoRepository->findTextos($slugg);
    $titulo = 'Pesca deportiva en la provincia de ' . $ppp2[0]['lugarturistico'];
    $keywords = 'argentina pesca deportiva provincia ' . $ppp2[0]['lugarturistico'] . ' alojamiento excursiones distancias';
    $description = 'La pesca deportiva en la provincia de ' . $ppp2[0]['lugarturistico'];

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    $ppp3 = $this->textoRepository->findTablalugares2($slugg);

    $pescaprovincia = $this->textoRepository->findPescaprovincias($slugg);
    $menulocal = 'pescadeportivaprovincia';
    $sluggg = null;

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

    return $this->render('pescaprovincia.html.twig', array(
      'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg, 'sluggg' => $sluggg, 'menulocal' => $menulocal, 'pescaprovincia' => $pescaprovincia, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
