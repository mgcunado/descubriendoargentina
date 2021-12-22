<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

use App\Service\SeoData;

class PescaprovinciaController extends Controller
{
    /**
     * @Route("/ar/{slug}/{slugg}/pescadeportiva/provincia/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"= null, "menulocal"="pescadeportivaprovincia"}, name="pescadeportivaprovincia")
     */
    public function pescaprovinciaAction(Request $request, SeoData $seoData, $slug, $slugg, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        //pescadeportivaprovincias
        $ppp1 = null;
        $ppp2 = $em->getRepository('App:JosContent')->findTextos($slugg);
        $titulo = 'Pesca deportiva en la provincia de ' . $ppp2[0]['lugarturistico'];
        $keywords = 'argentina pesca deportiva provincia ' . $ppp2[0]['lugarturistico'] . ' alojamiento excursiones distancias';
        $description = 'La pesca deportiva en la provincia de ' . $ppp2[0]['lugarturistico'];

        $seoPage = $this->get('sonata.seo.page');
        $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

        $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);

        $pescaprovincia = $em->getRepository('App:PescaDeportiva')->findPescaprovincias($slugg);
        $menulocal = 'pescadeportivaprovincia';
        $sluggg = null;


        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        return $this->render('pescaprovincia.html.twig', array(
            'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'pescaprovincia' => $pescaprovincia, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
