<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

class PescadeportivaController extends Controller
{
   /** 
    * @Route("/ar/{slug}/{slugg}/{sluggg}/pescadeportiva/", defaults={"slug"="patagonia", "slugg"="neuquen", "sluggg"="alumine", "menulocal"="pescadeportiva"}, name="pescadeportiva")
   */
   public function pescadeportivaAction($slug, $slugg, $sluggg, $menulocal, Request $request)
   {   
      $em = $this->getDoctrine()->getManager();
      $seoPage = $this->get('sonata.seo.page');
      $seoPage
         ->addMeta('name', 'robots', 'index, follow');      

         //pescadeportiva
         $ppp1 = null;
         $ppp2 = $em->getRepository('App:JosContent')->findTextos($sluggg);
         $titulo = 'Pesca deportiva en '.$ppp2[0]['lugarturistico'];
         $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
         $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina pesca deportiva alojamiento '.$ppp2[0]['lugarturistico'].' excursiones distancias')
            ->addMeta('name', 'description', 'La pesca deportiva en '.$ppp2[0]['lugarturistico'].', uno de los cantros turísticos en Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'La pesca deportiva en '.$ppp2[0]['lugarturistico'].', uno de los cantros turísticos en Argentina');

      
         $menulocal = 'pescadeportiva';


      /* Incluimos las Coordenadas */
      $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

      /* Incluimos la variable de pescacentroturistico para poder pintar o no en el menu centroturistico el apartado de Pesca Deportiva */
        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

      return $this->render('pescadeportiva.html.twig', array(
         'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug,  'slugg' => $slugg,  'sluggg' => $sluggg,  'menulocal' => $menulocal, 'pescacentroturistico' => $pescacentroturistico, 'coordenadasController' => $coordenadasController, 'titulo' => $titulo, 'seoPage' => $seoPage
      )); 
   } 

}
