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


class CasinosController extends Controller
{
    /**
     * @Route("/casinos", defaults={"menulocal"="casinos"}, name="casinos")
     */
    public function casinosAction(Request $request, TransformName $transformName, $menulocal)
    {
        $em = $this->getDoctrine()->getManager();

        $ppp1 = $em->getRepository('App:JosContent')->findProvinciascasinos();
        $titulo = 'Casinos en Argentina';
        $filas = count($ppp1);
        $seoPage = $this->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'robots', 'index, follow')
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina casinos alojamiento excursiones distancia')
            ->addMeta('name', 'description', 'Casinos en Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'Casinos en Argentina');



        $data = array('Todas' => '%');
        $i = 0;
        while ($i < $filas) {
            $datanew = array($ppp1[$i]['provincia'] => $ppp1[$i]['provincia']);
            $data = array_merge($data, $datanew);
            $i = $i + 1;
        }

        $casinos = new Casinos();

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        $formulario = $this->createFormBuilder($casinos)
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
            $provincia = $formulario->get('provincia')->getData();
            $ppp2 = $em->getRepository('App:JosContent')->findCasinos($provincia);
            $fotos = $transformName->doTransform($ppp2, 'casinos');

            return $this->render('casinosver.html.twig', array(
                'ppp2' => $ppp2, 'fotos' => $fotos, 'provincia' => $provincia, 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
            ));
        }

        return $this->render('casinos.html.twig', array(
            'formulario' => $formulario->createView(), 'coordenadasController' => $coordenadasController, 'menulocal' => $menulocal, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }
}
