<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

class ExcursionesController extends Controller
{
    /**
     * @Route("/ar/{slug}/{slugg}/{sluggg}/excursiones/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"="excursiones"}, name="excursiones")
     */
    public function excursionesAction($slug, $slugg, $sluggg, $menulocal, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seoPage = $this->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'robots', 'index, follow');

        //excursiones
        $ppp1 = null;
        $ppp2 = $em->getRepository('App:JosContent')->findExcursiones($sluggg);
        $titulo = 'Excursiones en ' . $ppp2[0]['lugarturistico'];
        $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);

        //construyendo array de existencia de archivos para pasarlo a twig a través de una variable declarada (excursiones)
        $filas = count($ppp2);
        $basenombreimg = $ppp2[0]['alias'];
        $array = array(0);

        for ($i = 1; $i < $filas + 1; $i++) {
            $nombreimg = 'images/excursiones/' . $basenombreimg . $i . '.jpg';
            if (file_exists($nombreimg)) {
                array_push($array, 1);
            } else {
                array_push($array, 0);
            }
        }
        $excursiones = $array;
        $direccionarray = null;
        $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina excursiones paseos alojamiento ' . $ppp2[0]['lugarturistico'] . ' distancias')
            ->addMeta('name', 'description', 'Paseos y excursiones en ' . $ppp2[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'Paseos y excursiones en ' . $ppp2[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina');


        //$menulocal = 'excursiones';


        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

        return $this->render('excursiones.html.twig', array(
            'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'excursiones' => $excursiones, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
