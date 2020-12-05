<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

class ProvinciaController extends Controller
{
   /** 
    * @Route("/ar/{slug}/{slugg}/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"= null, "menulocal"=null}, name="provincia")
   */
   public function provinciaAction($slug, $slugg, $menulocal, Request $request)
   {   
      $em = $this->getDoctrine()->getManager();
      $seoPage = $this->get('sonata.seo.page');
      $seoPage
         ->addMeta('name', 'robots', 'index, follow');      

         //provincias
         $ppp1 = $em->getRepository('App:JosMenu')->findImagen($slugg);
         $ppp2 = $em->getRepository('App:JosContent')->findTextos($slugg);
         $titulo = 'Provincia de '.$ppp2[0]['lugarturistico'];
         $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
         $sluggg = null;
         /*$excursiones = null;
         $direccionarray = null;*/
         $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina alojamiento provincia '.$ppp2[0]['lugarturistico'].' excursiones distancias')
            ->addMeta('name', 'description', 'La provincia de '.$ppp2[0]['lugarturistico'].' es una de las provincias de Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'La provincia de '.$ppp2[0]['lugarturistico'].' es una de las provincias de Argentina');

         //$pescaprovincia = null;
      

      /* Incluimos las Coordenadas */
      $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

      return $this->render('provincia.html.twig', array(
         'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
      )); 
   } 

}
