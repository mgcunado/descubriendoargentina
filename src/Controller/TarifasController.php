<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Menu;
use App\Entity\Tarifas;

class TarifasController extends Controller
{
   /**
    * @Route("/tarifas", name="tarifas")
    */
   public function tarifasAction()
   {
      $em = $this->getDoctrine()->getManager();

      $ppp1 = $em->getRepository('App:Menu')->findMenus();
      $ppp2 = $em->getRepository('App:Tarifas')->findTarifas();
      $linka = 3;

      return $this->render('tarifas.html.twig', array(
         'ppp1' => $ppp1, 'ppp2' => $ppp2, 'linka' => $linka
      ));        
   }
}
