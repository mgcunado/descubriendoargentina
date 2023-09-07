<?php

namespace App\Controller;

use App\Repository\AlojamientosRepository;
use App\Repository\TextoRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Alojamientos;
use App\Entity\Emailenviados;
use App\Form\Type\EmailenviadosType;

use Symfony\Component\Mailer\MailerInterface;

use App\Service\SeoData;
use App\Service\GlobalDirection;
use App\Service\SendEmails;

class AlojamientoController extends Controller
{
  private $alojamientosRepository;
  private $textoRepository;

  public function __construct(AlojamientosRepository $alojamientosRepository, TextoRepository $textoRepository)
  {
    $this->alojamientosRepository = $alojamientosRepository;
    $this->textoRepository = $textoRepository;
  }

  /**
     * @Route("/ar/{regionSlug}/{provinceSlug}/{localitySlug}/alojamiento/", defaults={"regionSlug"="patagonia", "provinceSlug"="rionegro", "localitySlug"="bariloche", "menulocal"="alojamiento"}, name="alojamiento")
     * @param string $regionSlug
     * @param string $provinceSlug
     * @param string $localitySlug
     * @param string $menulocal
     * @return Response
     */
  public function alojamientoAction(Request $request, MailerInterface $mailer, GlobalDirection $globalDirection, SeoData $seoData, SendEmails $sendEmails, $regionSlug, $provinceSlug, $localitySlug, $menulocal): Response
  {
    $touristLocality = $this->alojamientosRepository->findTouristLocality($localitySlug);

    $localidad = $touristLocality[0]['centroTuristico'];
    $provincia = $touristLocality[0]['provincia'];

    $accommodationTypes = $this->alojamientosRepository->accommodationTypes($localidad, $provincia);
    $filas = count($accommodationTypes);
    $types = array();
    $i = 0;
    while ($i < $filas) {
      $type = $accommodationTypes[$i]['tipo'];
      array_push($types, $type);
      $i = $i + 1;
    }

    $findTypesCategoriesByLocality = $this->alojamientosRepository->findTypesCategoriesByLocality($localidad, $provincia, $localitySlug);
    $accommodationInfoByLocality = $this->alojamientosRepository->accommodationInfoByLocality($localidad, $provincia);
    $touristCenterByProvince = $this->textoRepository->touristCenterByProvince($provinceSlug);

    /* Localidades Cercanas */
    $latitud1 = $touristLocality[0]['latitud'];
    $longitud1 = $touristLocality[0]['longitud'];

    $accommodationInfoByAuxLocality = $this->alojamientosRepository->accommodationInfoByAuxLocality($latitud1, $longitud1);
    $filas1aux = count($accommodationInfoByAuxLocality);

    $i = 0;
    $arrayorientacionesaux = array();

    while ($i < $filas1aux) {
      $longitud2 = $accommodationInfoByAuxLocality[$i]['longitud'];
      $latitud2 = $accommodationInfoByAuxLocality[$i]['latitud'];
      $dirNS = $latitud2 - $latitud1;
      $dirEO = $longitud2 - $longitud1;

      //para evitar el error: Warning: Division by zero
      if ($dirEO == 0) {
        $dirEO = 0.01;
      }

      $dirGLOBAL = $dirNS / $dirEO;
      $direccion = $globalDirection->getDirection($dirGLOBAL, $dirEO, $dirNS);

      array_push($arrayorientacionesaux, $direccion);

      $i = $i + 1;
    }

    $i = 0;

    $auxTypes = array();
    $typesCategoriesByAuxLocality = array();
    $accommodationInfoByLocalityAuxIncluded = array();

    while ($i < $filas1aux) {

      $localidad = $accommodationInfoByAuxLocality[$i]['localidad'];
      $provincia = $accommodationInfoByAuxLocality[$i]['provincia'];
      $findTypesCategoriesByAuxLocality = $this->alojamientosRepository->findTypesCategoriesByAuxLocality($localidad, $provincia);
      if (count($findTypesCategoriesByAuxLocality) > 0) {
        $typesCategoriesByAuxLocality = array_merge($typesCategoriesByAuxLocality, $findTypesCategoriesByAuxLocality);
      }
      $accommodationInfoByLocalityaux = $this->alojamientosRepository->accommodationInfoByLocality($localidad, $provincia);
      $accommodationInfoByLocalityAuxIncluded = array_merge($accommodationInfoByLocalityAuxIncluded, $accommodationInfoByLocalityaux);

      $accommodationTypes = $this->alojamientosRepository->accommodationTypes($localidad, $provincia);
      $accommodationTypesCount = count($accommodationTypes);

      $ii = 0;
      while ($ii < $accommodationTypesCount) {
        $type = $accommodationTypes[$ii]['tipo'];
        $localidadd = $localidad . $ii;
        $auxType = array($localidadd => $type);
        $auxTypes = array_merge($auxTypes, $auxType);
        $ii = $ii + 1;
      }
      $i = $i + 1;
    }
    /* Fin Localidades Cercanas */

    // Construimos el CollectionType con las direcciones del Centro Turístico
    $emailenviados = new Emailenviados();

    $filas = count($accommodationInfoByLocality);
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
    $filas = count($accommodationInfoByLocalityAuxIncluded);
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

    $titulo = 'Alojamiento en ' . $localidad;
    $keywords = 'argentina alojamiento ' . $localidad . ' hotel cabaña albergue bungalow hostal camping excursiones distancias';
    $description = 'Alojamiento en ' . $localidad . ', uno de los centros turísticos de Argentina';

    $seoPage = $this->get('sonata.seo.page');
    $seoPage = $seoData->addData($titulo, $keywords, $description, $seoPage);

    /* Incluimos las Coordenadas */
    $coordenadasController = $this->get('coordenadasservice')->maparegionesAction();
    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    if ($formulario->isSubmitted() && $formulario->isValid()) {
      $calculomatematico = $formulario['calculomatematico']->getData(); // campo oculta para controlar el envio de form por robots*/
      $resultadocalculo = $formulario['resultadocalculo']->getData();

      //lógica para saber a donde enviar el email múltiple
      $emailmultiple = array();

      $sumaalvalor = count($accommodationInfoByLocality);
      foreach ($_POST as $nombre_campo => $valor) {
        if (strpos($nombre_campo, 'op') !== false) {
          if ((substr(urldecode($nombre_campo), 0, 2))) {

            if ($valor < $sumaalvalor) {
              array_push($emailmultiple, $accommodationInfoByLocality[$valor]['email']);
            } else {
              $valoraux = $valor - $sumaalvalor;
              array_push($emailmultiple, $accommodationInfoByLocalityAuxIncluded[$valoraux]['email']);
            }
          }
        }
      }

      $message = $sendEmails->sendMultiple($formulario);

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
    $pescacentroturistico = $this->textoRepository->findPescadeportiva($localitySlug);

    return $this->render('articulo.html.twig', array(
      'emailenviados' => $emailenviados, 'formulario' => $formulario, 'emailmultiple' => $emailmultiple, 'menulocal' => $menulocal, 'findTypesCategoriesByLocality' => $findTypesCategoriesByLocality, 'touristCenterByProvince' => $touristCenterByProvince, 'regionSlug' => $regionSlug, 'provinceSlug' => $provinceSlug, 'localitySlug' => $localitySlug, 'touristLocality' => $touristLocality, 'accommodationTypes' => $accommodationTypes, 'types' => $types, 'accommodationInfoByLocality' => $accommodationInfoByLocality, 'excursiones' => null, 'direccionarray' => null, 'accommodationInfoByAuxLocality' => $accommodationInfoByAuxLocality, 'auxTypes' => $auxTypes, 'typesCategoriesByAuxLocality' => $typesCategoriesByAuxLocality, 'accommodationInfoByLocalityAuxIncluded' => $accommodationInfoByLocalityAuxIncluded, 'arrayorientacionesaux' => $arrayorientacionesaux, 'coordenadasController' => $coordenadasController, 'consultaenviada' => $consultaenviada, 'calculorealizado' => $calculorealizado, 'pescacentroturistico' => $pescacentroturistico, 'titulo' => $titulo, 'seoPage' => $seoPage

// 'emailenviados' => $emailenviados, 'formulario' => $formulario, 'emailmultiple' => $emailmultiple, 'menulocal' => $menulocal, 'ppp2' => $ppp2, 'ppp3' => $ppp3, 'slug' => $slug, 'slugg' => $slugg, 'sluggg' => $sluggg, 'aaa0' => $aaa0, 'aaat12' => $aaat12, 'tipos' => $tipos, 'aaa3' => $aaa3, 'excursiones' => null, 'direccionarray' => null, 'local2aux' => $local2aux, 'arraytiposaux' => $arraytiposaux, 'arrayppp2aux' => $arrayppp2aux, 'arrayaaa3aux' => $arrayaaa3aux, 'arrayorientacionesaux' => $arrayorientacionesaux, 'coordenadasController' => $coordenadasController, 'consultaenviada' => $consultaenviada, 'calculorealizado' => $calculorealizado, 'pescacentroturistico' => $pescacentroturistico, 'titulo' => $titulo, 'seoPage' => $seoPage
    ));
  }
}
