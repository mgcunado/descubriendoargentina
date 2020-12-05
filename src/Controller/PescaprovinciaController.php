<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

class PescaprovinciaController extends Controller
{
   /** 
    * @Route("/ar/{slug}/{slugg}/pescadeportiva/provincia/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"= null, "menulocal"="pescadeportivaprovincia"}, name="pescadeportivaprovincia")
   */
   public function pescaprovinciaAction($slug, $slugg, $menulocal, Request $request)
   {   
      $em = $this->getDoctrine()->getManager();
      $seoPage = $this->get('sonata.seo.page');
      $seoPage
         ->addMeta('name', 'robots', 'index, follow');      

         //pescadeportivaprovincias
        $ppp1 = null;
         $ppp2 = $em->getRepository('App:JosContent')->findTextos($slugg);
         $titulo = 'Pesca deportiva en la provincia de '.$ppp2[0]['lugarturistico'];
         $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
         $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina pesca deportiva provincia '.$ppp2[0]['lugarturistico'].' alojamiento excursiones distancias')
            ->addMeta('name', 'description', 'La pesca deportiva en la provincia de '.$ppp2[0]['lugarturistico'])
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'La pesca deportiva en la provincia de '.$ppp2[0]['lugarturistico']);

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
