<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Alojamientos;
use App\Entity\Poligonosregiones;

use App\Service\SeoData;

class ApctaController extends Controller
{
    /**
     * @Route("/principalescentrosturisticos", defaults={"menulocal"="principalescentrosturisticos"}, name="principalescentrosturisticos")
     */
    public function apctaAction(SeoData $seoData, $menulocal)
    {
        $cantidad = 20;

        $em = $this->getDoctrine()->getManager();

        $titulo = 'Alojamiento en los principales Centros Turísticos de Argentina';
        $keywords = 'argentina alojamiento principales centros turismo turistico';
        $description = $titulo;

        $seoPage = $this->get('sonata.seo.page');
        $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

        $alojamientosprincipales = $em->getRepository('App:TablaEnlacesCentros')->findAlojamientosprincipales();

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();


        return $this->render('principalescentrosturisticos.html.twig', array(
            'alojamientosprincipales' => $alojamientosprincipales, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'seoPage' => $seoPage
        ));
    }

    /**
     * @Route("/mapainteractivo/{region}", defaults={"region"= null, "menulocal"="mapainteractivo"}, name="mapainteractivo")
     */
    public function mapainteractivoAction(SeoData $seoData, $region, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        $titulo = ($region == null || $region == 'argentina') ? 'Mapa interactivo de Alojamiento en Argentina' : 'Mapa interactivo de Alojamiento en región ' . $region;

        $keywords = 'argentina alojamiento mapa interactivo principales centros turismo turistico';
        $description = $titulo;

        $seoPage = $this->get('sonata.seo.page');
        $SeoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

        $alojamientosfaltantes = array('melincue', 'choelechoel', 'riocolorado', 'islamartingarcia', 'eltigre', 'montehermoso', 'reta', 'lastoninas', 'costachica', 'nuevaatlantis', 'jacintoarauz', 'parqueprovincialaconcagua', 'nacunan', 'villavicencio', 'volcantupungato', 'valledelaluna', 'cerroalcazar', 'cerromercedario', 'embalsequebradadeullum', 'reservadelabiosferasanguillermo', 'reservadelvallefertil', 'pasodelospatos', 'parquenacionalchaco', 'parqueprovincialpampadelindio', 'esterosdelibera', 'parquenacionalriopilcomayo', 'banadodelaestrella', 'lagunayema', 'reservanaturalformosa', 'lagunabrava', 'diquedelossauces', 'cerrodelacruz', 'diquelosquiroga', 'parqueprovincialcopo', 'laboca', 'venadotuerto', 'coronda', 'victorica', 'sancarloscentro', 'campodelcielo', 'sanfranciscodelaishi', 'pobladosypaisajesdelapuna', 'fiambala', 'parquezoologico', 'lasflores', 'lobos', 'colonia25demayo', 'intendentealvear');


        $resultalojamientosprincipales = $em->getRepository('App:TablaEnlacesCentros')->findAlojamientosprincipales2($region, $alojamientosfaltantes);

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        return $this->render('mapainteractivo.html.twig', array(
            'region' => $region, 'coordenadasController' => $coordenadasController, 'resultalojamientosprincipales' => $resultalojamientosprincipales, 'menulocal' => $menulocal, 'seoPage' => $seoPage
        ));
    }
}
