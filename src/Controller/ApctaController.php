<?php
// apcta: alojamiento principales centros turisticos argentina
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


    public function maparegionesAction()
    {
        $em = $this->getDoctrine()->getManager();

        /***  Coordenadas ***/
        $norte = $em->getRepository('App:Poligonosregiones')->findMaparegiones('%', 'latitud desc', '1');
        $Norte = $norte[0]['latitud'];

        $sur = $em->getRepository('App:Poligonosregiones')->findMaparegiones('%', 'latitud', '1');
        $Sur = $sur[0]['latitud'];

        $este = $em->getRepository('App:Poligonosregiones')->findMaparegiones('%', 'longitud desc', '1');
        $Este = $este[0]['longitud'];

        $oeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('%', 'longitud', '1');
        $Oeste = $oeste[0]['longitud'];

        $centro1 = ($Norte + $Sur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
        $centro2 = ($Este + $Oeste) * 0.5;


        /* Patagonia1  */
        $P1norte = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Patagonia1', 'latitud desc', '1');
        $P1Norte = $P1norte[0]['latitud'];

        $P1sur = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Patagonia1', 'latitud', '1');
        $P1Sur = $P1sur[0]['latitud'];

        $P1este = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Patagonia1', 'longitud desc', '1');
        $P1Este = $P1este[0]['longitud'];

        $P1oeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Patagonia1', 'longitud', '1');
        $P1Oeste = $P1oeste[0]['longitud'];

        $P1centro1 = ($P1Norte + $P1Sur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
        $P1centro2 = ($P1Este + $P1Oeste) * 0.5;


        /* Pampa */
        $Pnorte = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Pampa', 'latitud desc', '1');
        $PNorte = $Pnorte[0]['latitud'];

        $Psur = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Pampa', 'latitud', '1');
        $PSur = $Psur[0]['latitud'];

        $Peste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Pampa', 'longitud desc', '1');
        $PEste = $Peste[0]['longitud'];

        $Poeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Pampa', 'longitud', '1');
        $POeste = $Poeste[0]['longitud'];

        $Pcentro1 = ($PNorte + $PSur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
        $Pcentro2 = ($PEste + $POeste) * 0.5;


        /* Cuyo  */
        $Cnorte = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Cuyo', 'latitud desc', '1');
        $CNorte = $Cnorte[0]['latitud'];

        $Csur = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Cuyo', 'latitud', '1');
        $CSur = $Csur[0]['latitud'];

        $Ceste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Cuyo', 'longitud desc', '1');
        $CEste = $Ceste[0]['longitud'];

        $Coeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Cuyo', 'longitud', '1');
        $COeste = $Coeste[0]['longitud'];

        $Ccentro1 = ($CNorte + $CSur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
        $Ccentro2 = ($CEste + $COeste) * 0.5;


        /* Noreste */
        $NEnorte = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noreste', 'latitud desc', '1');
        $NENorte = $NEnorte[0]['latitud'];

        $NEsur = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noreste', 'latitud', '1');
        $NESur = $NEsur[0]['latitud'];

        $NEeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noreste', 'longitud desc', '1');
        $NEEste = $NEeste[0]['longitud'];

        $NEoeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noreste', 'longitud', '1');
        $NEOeste = $NEoeste[0]['longitud'];

        $NEcentro1 = ($NENorte + $NESur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
        $NEcentro2 = ($NEEste + $NEOeste) * 0.5;


        /* Noroeste */
        $NOnorte = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noroeste', 'latitud desc', '1');
        $NONorte = $NOnorte[0]['latitud'];

        $NOsur = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noroeste', 'latitud', '1');
        $NOSur = $NOsur[0]['latitud'];

        $NOeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noroeste', 'longitud desc', '1');
        $NOEste = $NOeste[0]['longitud'];

        $NOoeste = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noroeste', 'longitud', '1');
        $NOOeste = $NOoeste[0]['longitud'];

        $NOcentro1 = ($NONorte + $NOSur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
        $NOcentro2 = ($NOEste + $NOOeste) * 0.5;



        /* Resultados Regiones */
        $resultNO = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noroeste', 'id', '9999');
        $resultNE = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Noreste', 'id', '9999');
        $resultC = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Cuyo', 'id', '9999');
        $resultP = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Pampa', 'id', '9999');
        $resultP1 = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Patagonia1', 'id', '9999');
        $resultP2 = $em->getRepository('App:Poligonosregiones')->findMaparegiones('Patagonia2', 'id', '9999');

        /*** fin Coordenadas ***/

        $myArray = array('centro1' => $centro1, 'centro2' => $centro2, 'P1centro1' => $P1centro1,  'P1centro2' => $P1centro2, 'Pcentro1' => $Pcentro1,  'Pcentro2' => $Pcentro2, 'Ccentro1' => $Ccentro1,  'Ccentro2' => $Ccentro2, 'NEcentro1' => $NEcentro1,  'NEcentro2' => $NEcentro2, 'NOcentro1' => $NOcentro1,  'NOcentro2' => $NOcentro2, 'resultP1' => $resultP1, 'resultP2' => $resultP2, 'resultP' => $resultP, 'resultC' => $resultC, 'resultNE' => $resultNE, 'resultNO' => $resultNO);
        return $myArray;
    }

    /**
     * @Route("/mapainteractivo/{region}", defaults={"region"= null, "menulocal"="mapainteractivo"}, name="mapainteractivo")
     */
    public function mapainteractivoAction($region, $menulocal)
    {
        /*$cantidad=20;*/

        $em = $this->getDoctrine()->getManager();
        if ($region == null || $region == 'argentina') {
            $titulo = 'Mapa interactivo de Alojamiento en Argentina';
        } else {
            $titulo = 'Mapa interactivo de Alojamiento en región ' . $region;
        }
        $seoPage = $this->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'robots', 'index, follow')
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina alojamiento mapa interactivo principales centros turismo turistico')
            ->addMeta('name', 'description', $titulo)
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', $titulo);



        $alojamientosfaltantes = array('melincue', 'choelechoel', 'riocolorado', 'islamartingarcia', 'eltigre', 'montehermoso', 'reta', 'lastoninas', 'costachica', 'nuevaatlantis', 'jacintoarauz', 'parqueprovincialaconcagua', 'nacunan', 'villavicencio', 'volcantupungato', 'valledelaluna', 'cerroalcazar', 'cerromercedario', 'embalsequebradadeullum', 'reservadelabiosferasanguillermo', 'reservadelvallefertil', 'pasodelospatos', 'parquenacionalchaco', 'parqueprovincialpampadelindio', 'esterosdelibera', 'parquenacionalriopilcomayo', 'banadodelaestrella', 'lagunayema', 'reservanaturalformosa', 'lagunabrava', 'diquedelossauces', 'cerrodelacruz', 'diquelosquiroga', 'parqueprovincialcopo', 'laboca', 'venadotuerto', 'coronda', 'victorica', 'sancarloscentro', 'campodelcielo', 'sanfranciscodelaishi', 'pobladosypaisajesdelapuna', 'fiambala', 'parquezoologico', 'lasflores', 'lobos', 'colonia25demayo', 'intendentealvear');



        $resultalojamientosprincipales = $em->getRepository('App:TablaEnlacesCentros')->findAlojamientosprincipales2($region, $alojamientosfaltantes);

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();
        //$mapageneral = 'si';



        return $this->render('mapainteractivo.html.twig', array(
            'region' => $region, 'coordenadasController' => $coordenadasController, 'resultalojamientosprincipales' => $resultalojamientosprincipales, 'menulocal' => $menulocal, 'seoPage' => $seoPage

        ));
    }
}
