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

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class AlojamientoController extends Controller
{
    /**
     * @Route("/ar/{slug}/{slugg}/{sluggg}/alojamiento/", defaults={"slug"="patagonia", "slugg"="rionegro", "sluggg"="bariloche", "menulocal"="alojamiento"}, name="alojamiento")
     */
    public function alojamientoAction($slug, $slugg, $sluggg, $menulocal, Request $request, MailerInterface $mailer)
    {
        $em = $this->getDoctrine()->getManager();
        $seoPage = $this->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'robots', 'index, follow');

        $aaa0 = $em->getRepository('App:Alojamientos')->findAlojamiento0($sluggg);

        $localidad = $aaa0[0]['centroTuristico'];
        $titulo = 'Alojamiento en ' . $localidad;
        $provincia = $aaa0[0]['provincia'];

        $aaat12 = $em->getRepository('App:Alojamientos')->findAlojamientot12($localidad, $provincia);
        $filas = count($aaat12);
        $tipos = array();
        $i = 0;
        while ($i < $filas) {
            $tipo1 = $aaat12[$i]['tipo'];
            array_push($tipos, $tipo1);
            $i = $i + 1;
        }

        $ppp2 = $em->getRepository('App:Alojamientos')->findAlojamiento2($localidad, $provincia, $sluggg);
        $aaa3 = $em->getRepository('App:Alojamientos')->findAlojamiento3($localidad, $provincia);
        $ppp3 = $em->getRepository('App:TablaEnlacesCentros')->findTablalugares2($slugg);

        /* Localidades Cercanas */
        $latitud1 = $aaa0[0]['latitud'];
        $longitud1 = $aaa0[0]['longitud'];

        $local2aux = $em->getRepository('App:Alojamientos')->findLocalidades2aux($latitud1, $longitud1);
        $filas1aux = count($local2aux);

        $i = 0;
        $arrayorientacionesaux = array();

        while ($i < $filas1aux) {
            $longitud2 = $local2aux[$i]['longitud'];
            $latitud2 = $local2aux[$i]['latitud'];
            $dirNS = $latitud2 - $latitud1;
            $dirEO = $longitud2 - $longitud1;

            //para evitar el error: Warning: Division by zero
            if ($dirEO == 0) {
                $dirEO = 0.01;
            }

            $dirGLOBAL = $dirNS / $dirEO;

            if ($dirGLOBAL <= tan(22.5 * 0.01745329252) && $dirGLOBAL >= tan(-22.5 * 0.01745329252) && $dirEO > 0) {
                $direccion = "Este";
            } elseif ($dirGLOBAL > tan(22.5 * 0.01745329252) && $dirGLOBAL < tan(67.5 * 0.01745329252) && $dirNS > 0 && $dirEO > 0) {
                $direccion = "Noreste";
            } elseif (($dirGLOBAL >= tan(67.5 * 0.01745329252) || $dirGLOBAL <= tan(112.5 * 0.01745329252)) && $dirNS > 0) {
                $direccion = "Norte";
            } elseif ($dirGLOBAL > tan(112.5 * 0.01745329252) && $dirGLOBAL < tan(157.5 * 0.01745329252) && $dirNS > 0) {
                $direccion = "Noroeste";
            } elseif ($dirGLOBAL >= tan(157.5 * 0.01745329252) && $dirGLOBAL <= tan(202.5 * 0.01745329252) && $dirEO < 0) {
                $direccion = "Oeste";
            } elseif ($dirGLOBAL > tan(202.5 * 0.01745329252) && $dirGLOBAL < tan(247.5 * 0.01745329252) && $dirNS < 0 && $dirEO < 0) {
                $direccion = "Suroeste";
            } elseif (($dirGLOBAL >= tan(247.5 * 0.01745329252) || $dirGLOBAL <= tan(292.5 * 0.01745329252)) && $dirNS < 0) {
                $direccion = "Sur";
            } elseif ($dirGLOBAL > tan(292.5 * 0.01745329252) && $dirGLOBAL < tan(-22.5 * 0.01745329252) && $dirNS < 0) {
                $direccion = "Sureste";
            }

            array_push($arrayorientacionesaux, $direccion);

            $i = $i + 1;
        }

        $i = 0;

        $arraytiposaux = array();
        $arrayppp2aux = array();
        $arrayaaa3aux = array();

        while ($i < $filas1aux) {

            $localidad = $local2aux[$i]['localidad'];
            $provincia = $local2aux[$i]['provincia'];
            $ppp2aux = $em->getRepository('App:Alojamientos')->findAlojamiento2aux($localidad, $provincia);
            if (count($ppp2aux) > 0) {
                $arrayppp2aux = array_merge($arrayppp2aux, $ppp2aux);
            }
            $aaa3aux = $em->getRepository('App:Alojamientos')->findAlojamiento3($localidad, $provincia);
            $arrayaaa3aux = array_merge($arrayaaa3aux, $aaa3aux);

            $aaat12aux = $em->getRepository('App:Alojamientos')->findAlojamientot12($localidad, $provincia);
            $filas2aux = count($aaat12aux);

            $ii = 0;
            while ($ii < $filas2aux) {
                $tipoaux = $aaat12aux[$ii]['tipo'];
                $localidadd = $localidad . $ii;
                $tipo1aux = array($localidadd => $tipoaux);
                $arraytiposaux = array_merge($arraytiposaux, $tipo1aux);
                $ii = $ii + 1;
            }
            $i = $i + 1;
        }
        /* Fin Localidades Cercanas */


        // Construimos el CollectionType con las direcciones del Centro Turístico
        $emailenviados = new Emailenviados();

        $filas = count($aaa3);
        $i = 0;
        while ($i < $filas) {
            $email = 'email' . $i;
            ${$email} = new Alojamientos();

            //Al enviar el formulario relacionaremos el array de emails con el array true-false enviado por el formulario
            ${$email}->setEnviado(false);
            $emailenviados->getDirecciones()->add(${$email});
            $i = $i + 1;
        }

        // Seguimos construyendo el CollectionType con las direcciones de las localidades cercanas
        $filas = count($arrayaaa3aux);
        $iaux = 0;
        while ($iaux < $filas) {
            $email = 'email' . $i;
            ${$email} = new Alojamientos();
            ${$email}->setEnviado(false);
            $emailenviados->getDirecciones()->add(${$email});
            $iaux = $iaux + 1;
            $i = $i + 1;
        }

        $formulario = $this->createForm(EmailenviadosType::class, $emailenviados);

        $formulario->handleRequest($request);

        $seoPage
            ->setTitle($titulo)
            ->addMeta('name', 'keywords', 'argentina alojamiento ' . $localidad . ' hotel cabaña albergue bungalow hostal camping excursiones distancias')
            ->addMeta('name', 'description', 'Alojamiento en ' . $localidad . ', uno de los centros turísticos de Argentina')
            ->addMeta('property', 'og:title', $titulo)
            ->addMeta('property', 'og:type', 'article')
            ->addMeta('property', 'og:description', 'Alojamiento en ' . $localidad . ', uno de los centros turísticos de Argentina');


        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();
        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);


        if ($formulario->isSubmitted() && $formulario->isValid()) {

            //$emailenviados = $formulario->getData();
            $calculomatematico = $formulario['calculomatematico']->getData(); // campo oculta para controlar el envio de form por robots*/
            $resultadocalculo = $formulario['resultadocalculo']->getData();

            //lógica para saber a donde enviar el email múltiple
            $emailmultiple = array();

            $sumaalvalor = count($aaa3);
            foreach ($_POST as $nombre_campo => $valor) {
                if (strpos($nombre_campo, 'op') !== false) {
                    if ((substr(urldecode($nombre_campo), 0, 2))) {

                        if ($valor < $sumaalvalor) {
                            array_push($emailmultiple, $aaa3[$valor]['email']);
                        } else {
                            $valoraux = $valor - $sumaalvalor;
                            array_push($emailmultiple, $arrayaaa3aux[$valoraux]['email']);
                        }
                    }
                }
            }

            $message = (new TemplatedEmail())
                ->from('mikel@descubriendoargentina.com')
                ->to('mikel@descubriendoargentina.com')
                ->subject('Reserva de alojamiento desde www.DescubriendoArgentina.com')
                ->htmlTemplate('emails/envioemailmultiple.html.twig')
                ->context([
                    'nombre' => $formulario['nombre']->getData(),
                    'telefono' => $formulario['telefono']->getData(),
                    'direccionemail' => $formulario['email']->getData(),
                    'fechallegada' => $formulario['fechallegada']->getData()->format('d/m/Y'),
                    'fechasalida' => $formulario['fechasalida']->getData()->format('d/m/Y'),
                    'pasajeros' => $formulario['pasajeros']->getData(),
                    'consulta' => $formulario['consulta']->getData(),
                ]);

            foreach ($emailmultiple as $directionbcc) {
                $message->addbcc($directionbcc);
            }

            if ($calculomatematico == $resultadocalculo) {
                $mailer->send($message);
                $calculorealizado = 'ok';
            } else {
                $calculorealizado = 'ko';
            }

            $consultaenviada = 'si';
            $formulario = $formulario->createView();
        } else {

            $consultaenviada = 'no';
            $calculorealizado = '';
            $emailenviados = null;
            $formulario = $formulario->createView();
            $emailmultiple = null;
        }

        /* Incluimos las Coordenadas */
        $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();

        /* Incluimos la variable de pescacentroturistico para poder pintar o no en el menu centroturistico el apartado de Pesca Deportiva */
        $pescacentroturistico = $em->getRepository('App:PescaDeportiva')->findPescadeportiva($sluggg);

        return $this->render('articulo.html.twig', array(
            'emailenviados' => $emailenviados, 'formulario' => $formulario, 'emailmultiple' => $emailmultiple, 'menulocal' => $menulocal, 'ppp2' => $ppp2,  'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg,  'sluggg' => $sluggg, 'aaa0' => $aaa0, 'aaat12' => $aaat12, 'tipos' => $tipos, 'aaa3' => $aaa3, 'excursiones' => null, 'direccionarray' => null, 'local2aux' => $local2aux, 'arraytiposaux' => $arraytiposaux, 'arrayppp2aux' => $arrayppp2aux, 'arrayaaa3aux' => $arrayaaa3aux, 'arrayorientacionesaux' => $arrayorientacionesaux, 'coordenadasController' => $coordenadasController, 'consultaenviada' => $consultaenviada, 'calculorealizado' => $calculorealizado, 'pescacentroturistico' => $pescacentroturistico, 'titulo' => $titulo, 'seoPage' => $seoPage
        ));
    }


    /**
     * @return \Sonata\SeoBundle\Seo\SeoPageInterface
     */
    private function getSeoPage()
    {
        return $this->get('sonata.seo.page');
    }
}
