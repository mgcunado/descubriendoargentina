<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

class RegionController extends Controller
{
   /** 
    * @Route("/ar/{slug}/", defaults={"slug"="patagonia", "menulocal"=null}, name="region")
   */
   public function regionAction($slug, $menulocal, Request $request)
   {   
      $em = $this->getDoctrine()->getManager();
      $seoPage = $this->get('sonata.seo.page');
      $seoPage
         ->addMeta('name', 'robots', 'index, follow');      

      //regiones
         $ppp1 = $em->getRepository('App:JosMenu')->findImagen($slug);
         $ppp2 = $em->getRepository('App:JosContent')->findTextos($slug);
         $titulo = $ppp2[0]['lugarturistico'];
         $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares1($slug);
         $slugg = null;

         $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina alojamiento '.$ppp2[0]['lugarturistico'].' excursiones distancias')
            ->addMeta('name', 'description', $ppp2[0]['lugarturistico'].' es una de las regiones que componen Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', $ppp2[0]['lugarturistico'].' es una de las regiones que componen Argentina');


      /* Incluimos las Coordenadas */
      $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

      return $this->render('region.html.twig', array(
         'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'menulocal' => $menulocal, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
      )); 
   } 

}
