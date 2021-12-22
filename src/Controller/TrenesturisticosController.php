<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\JosContent;
use App\Entity\JosMenu;
use App\Entity\Termas;
use App\Entity\Casinos;
use App\Entity\Rutadelvino;
use App\Entity\Trenesturisticos;

use App\Service\TransformName;

use App\Entity\Alojamientos;
use App\Entity\Emailenviados;
use App\Form\Type\EmailenviadosType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class TrenesturisticosController extends Controller
{

    /**
     * @Route("/trenesturisticos", defaults={"menulocal"="trenesturisticos"}, name="trenesturisticos")
     */
    public function trenesturisticosAction(Request $request, TransformName $transformName, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        $ppp1 = $em->getRepository('App:JosContent')->findProvinciastrenesturisticos();
        $titulo = 'Trenes Turísticos en Argentina';
        $filas = count($ppp1);
        $seoPage = $this->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'robots', 'index, follow')
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina trenes turísticos alojamiento excursiones distancia')
            ->addMeta('name', 'description', 'Trenes turísticos en Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'Trenes turísticos en Argentina');

        $data = array('Todas' => '%');
        $i = 0;
        while ($i < $filas) {
            $datanew = array($ppp1[$i]['provincia'] => $ppp1[$i]['provincia']);
            $data = array_merge($data, $datanew);
            $i = $i + 1;
        }

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        $trenesturisticos = new Trenesturisticos();

        $formulario = $this->createFormBuilder($trenesturisticos)
            ->add('provincia', ChoiceType::class, array(
                'attr' => array('class' => 'p-2 btn btn-light cursormano'),
                'choices'  => $data
            ))
            ->add('Ver Resultados', SubmitType::class, array(
                'attr' => array('class' => 'p-2 btn btn-light cursormano'),
            ))
            ->getForm();

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted()) {
            // $trenesturisticos = $formulario->getData();
            $provincia = $formulario->get('provincia')->getData();
            $ppp2 = $em->getRepository('App:JosContent')->findTrenesturisticos($provincia);

            $fotos = $transformName->doTransform($ppp2, 'trenes');

            return $this->render('trenesturisticosver.html.twig', array(
                'ppp2' => $ppp2, 'fotos' => $fotos, 'provincia' => $provincia, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
            ));
        }

        return $this->render('trenesturisticos.html.twig', array(
            'formulario' => $formulario->createView(), 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
