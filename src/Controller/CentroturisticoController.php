<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

class CentroturisticoController extends Controller
{
   /** 
     * @Route("/ar/{slug}/{slugg}/{sluggg}/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"=null}, name="centroturistico")
   */
   public function centroturisticoAction($slug, $slugg, $sluggg, $menulocal, Request $request)
   {   
      $em = $this->getDoctrine()->getManager();
      $seoPage = $this->get('sonata.seo.page');
      $seoPage
         ->addMeta('name', 'robots', 'index, follow');      

         $ppp1 = $em->getRepository('App:JosMenu')->findImagen($sluggg);
         $ppp2 = $em->getRepository('App:JosContent')->findTextos($sluggg);
         $titulo = $ppp2[0]['lugarturistico'];
         $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
         $excursiones = null;
         $direccionarray = null;
         $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina alojamiento '.$titulo.' excursiones distancias')
            ->addMeta('name', 'description', 'El centro turístico de '.$titulo.', en Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'El centro turístico de '.$titulo.', en Argentina');


      /* Incluimos las Coordenadas */
      $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

      return $this->render('centroturistico.html.twig', array(
         'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'excursiones' => null, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
      )); 
   } 

}
