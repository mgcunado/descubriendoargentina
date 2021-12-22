<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

use App\Service\SeoData;

class ProvinciaController extends Controller
{
    /**
     * @Route("/ar/{slug}/{slugg}/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"= null, "menulocal"=null}, name="provincia")
     */
    public function provinciaAction(Request $request, SeoData $seoData, $slug, $slugg, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        //provincias
        $ppp1 = $em->getRepository('App:JosMenu')->findImagen($slugg);
        $ppp2 = $em->getRepository('App:JosContent')->findTextos($slugg);
        $titulo = 'Provincia de ' . $ppp2[0]['lugarturistico'];
        $keywords = 'argentina alojamiento provincia ' . $ppp2[0]['lugarturistico'] . ' excursiones distancias';
        $description = 'La provincia de ' . $ppp2[0]['lugarturistico'] . ' es una de las provincias de Argentina';

        $seoPage = $this->get('sonata.seo.page');
        $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);


        $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
        $sluggg = null;

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        return $this->render('provincia.html.twig', array(
            'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
