<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

use App\Service\SeoData;

class CentroturisticoController extends Controller
{
    /**
     * @Route("/ar/{slug}/{slugg}/{sluggg}/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"=null}, name="centroturistico")
     */
    public function centroturisticoAction(Request $request, SeoData $seoData, $slug, $slugg, $sluggg, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        $ppp1 = $em->getRepository('App:JosMenu')->findImagen($sluggg);
        $ppp2 = $em->getRepository('App:JosContent')->findTextos($sluggg);
        $titulo = $ppp2[0]['lugarturistico'];
        $keywords = 'argentina alojamiento ' . $titulo . ' excursiones distancias';
        $description = 'El centro turístico de ' . $titulo . ', en Argentina';

        $seoPage = $this->get('sonata.seo.page');
        $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

        $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
        $excursiones = null;
        $direccionarray = null;

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

        return $this->render('centroturistico.html.twig', array(
            'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'excursiones' => null, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
