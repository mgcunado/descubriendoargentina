<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

use App\Service\SeoData;

class DistanciaController extends Controller
{
    /**
     * @Route("/ar/{slug}/{slugg}/{sluggg}/distancias/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"="distancias"}, name="distancias")
     */
    public function distanciaAction(Request $request, SeoData $seoData, $slug, $slugg, $sluggg, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        //tabla de distancias
        $ppp1 = $em->getRepository('App:TablaEnlacesCentros')->findTabladistancias1($sluggg);
        $titulo = 'Cuadro de distancias desde ' . $ppp1[0]['lugarturistico'];
        $keywords = 'argentina tabla distancias localidades cercanas alojamiento ' . $ppp1[0]['lugarturistico'] . ' excursiones';
        $description = 'Tabla de distancias en linea recta desde ' . $ppp1[0]['lugarturistico'] . ', uno de los centros turísticos de Argentina';

        $seoPage = $this->get('sonata.seo.page');
        $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);


        $latitud1 = $ppp1[0]['latitud'];
        $longitud1 = $ppp1[0]['longitud'];

        $ppp2 = $em->getRepository('App:TablaEnlacesCentros')->findTabladistancias2($sluggg, $latitud1, $longitud1);
        $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
        $filas = count($ppp2);

        /************************/
        $direccionarray = array();
        $i = 0;
        while ($i < $filas) {
            $latitud2 = $ppp2[$i]['latitud'];
            $longitud2 = $ppp2[$i]['longitud'];
            $dirNS = $latitud2 - $latitud1;
            $dirEO = $longitud2 - $longitud1;
            //para evitar el error: Warning: Division by zero
            if ($dirEO == 0) {
                $dirEO = 0.01;
            }
            $dirGLOBAL = $dirNS / $dirEO;

            if ($dirGLOBAL <= tan(22.5 * 0.01745329252) && $dirGLOBAL >= tan(-22.5 * 0.01745329252) && $dirEO > 0) {
                $direccion = "E";
            } elseif ($dirGLOBAL > tan(22.5 * 0.01745329252) && $dirGLOBAL < tan(67.5 * 0.01745329252) && $dirNS > 0 && $dirEO > 0) {
                $direccion = "NE";
            } elseif (($dirGLOBAL >= tan(67.5 * 0.01745329252) || $dirGLOBAL <= tan(112.5 * 0.01745329252)) && $dirNS > 0) {
                $direccion = "N";
            } elseif ($dirGLOBAL > tan(112.5 * 0.01745329252) && $dirGLOBAL < tan(157.5 * 0.01745329252) && $dirNS > 0) {
                $direccion = "NO";
            } elseif ($dirGLOBAL >= tan(157.5 * 0.01745329252) && $dirGLOBAL <= tan(202.5 * 0.01745329252) && $dirEO < 0) {
                $direccion = "O";
            } elseif ($dirGLOBAL > tan(202.5 * 0.01745329252) && $dirGLOBAL < tan(247.5 * 0.01745329252) && $dirNS < 0 && $dirEO < 0) {
                $direccion = "SO";
            } elseif (($dirGLOBAL >= tan(247.5 * 0.01745329252) || $dirGLOBAL <= tan(292.5 * 0.01745329252)) && $dirNS < 0) {
                $direccion = "S";
            } elseif ($dirGLOBAL > tan(292.5 * 0.01745329252) && $dirGLOBAL < tan(-22.5 * 0.01745329252) && $dirNS < 0) {
                $direccion = "SE";
            }


            $datanew = array($direccion);
            $direccionarray = array_merge($direccionarray, $datanew);
            $i = $i + 1;
        }

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

        return $this->render('distancia.html.twig', array(
            'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal,  'direccionarray' => $direccionarray, 'excursiones' => null, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
