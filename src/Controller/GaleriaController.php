<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;

use App\Entity\Alojamientos;
use App\Entity\Emailenviados;
use App\Form\Type\EmailenviadosType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class GaleriaController extends Controller
{
	/** 
	 * @Route("/ar/{slug}/{slugg}/{sluggg}/imagenes/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"="galeria"}, name="galeria")
	 */
	public function galeriaAction($slug, $slugg, $sluggg, $menulocal)
	{   
		$em = $this->getDoctrine()->getManager();

		$ppp1 = null;
		$ppp2 = $em->getRepository('App:JosContent')->findGaleria($sluggg);
		$titulo = 'Galería de imágenes de '.$ppp2[0]['lugarturistico'];
		$ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);
		//construyendo array de existencia de imágenes para pasarlo a twig a través de una variable declarada (galeria)
		//$filas = count($ppp2); 
		//$galeria = $filas;

		$seoPage = $this->get('sonata.seo.page');
			$seoPage
				->addMeta('name', 'robots', 'index, follow')    
				->setTitle($titulo)
				->addMeta('name', 'keywords', 'argentina galería imágenes alojamiento '.$ppp2[0]['lugarturistico'].' excursiones')
				->addMeta('name', 'description', 'Galería de imágenes de '.$ppp2[0]['lugarturistico'].', uno de los centros turísticos de Argentina')
				->addMeta('property', 'og:title', $titulo)
				->addMeta('property', 'og:type', 'article')
				->addMeta('property', 'og:description', 'Galería de imágenes de '.$ppp2[0]['lugarturistico'].', uno de los centros turísticos de Argentina');



		/* Incluimos las Coordenadas */
		$coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

		  $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

		return $this->render('galeria.html.twig', array(
			'ppp1' => $ppp1, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg,  'sluggg' => $sluggg, 'coordenadasController' => $coordenadasController, 'pescacentroturistico' => $pescacentroturistico, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
		)); 
	} 

}
