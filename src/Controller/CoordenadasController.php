<?php

namespace App\Controller;

use App\Repository\AlojamientosRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoordenadasController extends Controller
{
  private $alojamientosRepository;

  public function __construct(AlojamientosRepository $alojamientosRepository)
  {
    $this->alojamientosRepository = $alojamientosRepository;
  }

  public function maparegionesAction(): Array
  {
    /*** Coordenadas ***/
    $norte = $this->alojamientosRepository->findMaparegiones('%', 'latitud desc', '1');
    $Norte = $norte[0]['latitud'];

    $sur = $this->alojamientosRepository->findMaparegiones('%', 'latitud', '1');
    $Sur = $sur[0]['latitud'];

    $este = $this->alojamientosRepository->findMaparegiones('%', 'longitud desc', '1');
    $Este = $este[0]['longitud'];

    $oeste = $this->alojamientosRepository->findMaparegiones('%', 'longitud', '1');
    $Oeste = $oeste[0]['longitud'];

    $centro1 = ($Norte + $Sur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
    $centro2 = ($Este + $Oeste) * 0.5;

    /* Patagonia1 */
    $P1norte = $this->alojamientosRepository->findMaparegiones('Patagonia1', 'latitud desc', '1');
    $P1Norte = $P1norte[0]['latitud'];

    $P1sur = $this->alojamientosRepository->findMaparegiones('Patagonia1', 'latitud', '1');
    $P1Sur = $P1sur[0]['latitud'];

    $P1este = $this->alojamientosRepository->findMaparegiones('Patagonia1', 'longitud desc', '1');
    $P1Este = $P1este[0]['longitud'];

    $P1oeste = $this->alojamientosRepository->findMaparegiones('Patagonia1', 'longitud', '1');
    $P1Oeste = $P1oeste[0]['longitud'];

    $P1centro1 = ($P1Norte + $P1Sur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
    $P1centro2 = ($P1Este + $P1Oeste) * 0.5;

    /* Pampa */
    $Pnorte = $this->alojamientosRepository->findMaparegiones('Pampa', 'latitud desc', '1');
    $PNorte = $Pnorte[0]['latitud'];

    $Psur = $this->alojamientosRepository->findMaparegiones('Pampa', 'latitud', '1');
    $PSur = $Psur[0]['latitud'];

    $Peste = $this->alojamientosRepository->findMaparegiones('Pampa', 'longitud desc', '1');
    $PEste = $Peste[0]['longitud'];

    $Poeste = $this->alojamientosRepository->findMaparegiones('Pampa', 'longitud', '1');
    $POeste = $Poeste[0]['longitud'];

    $Pcentro1 = ($PNorte + $PSur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
    $Pcentro2 = ($PEste + $POeste) * 0.5;

    /* Cuyo */
    $Cnorte = $this->alojamientosRepository->findMaparegiones('Cuyo', 'latitud desc', '1');
    $CNorte = $Cnorte[0]['latitud'];

    $Csur = $this->alojamientosRepository->findMaparegiones('Cuyo', 'latitud', '1');
    $CSur = $Csur[0]['latitud'];

    $Ceste = $this->alojamientosRepository->findMaparegiones('Cuyo', 'longitud desc', '1');
    $CEste = $Ceste[0]['longitud'];

    $Coeste = $this->alojamientosRepository->findMaparegiones('Cuyo', 'longitud', '1');
    $COeste = $Coeste[0]['longitud'];

    $Ccentro1 = ($CNorte + $CSur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
    $Ccentro2 = ($CEste + $COeste) * 0.5;

    /* Noreste */
    $NEnorte = $this->alojamientosRepository->findMaparegiones('Noreste', 'latitud desc', '1');
    $NENorte = $NEnorte[0]['latitud'];

    $NEsur = $this->alojamientosRepository->findMaparegiones('Noreste', 'latitud', '1');
    $NESur = $NEsur[0]['latitud'];

    $NEeste = $this->alojamientosRepository->findMaparegiones('Noreste', 'longitud desc', '1');
    $NEEste = $NEeste[0]['longitud'];

    $NEoeste = $this->alojamientosRepository->findMaparegiones('Noreste', 'longitud', '1');
    $NEOeste = $NEoeste[0]['longitud'];

    $NEcentro1 = ($NENorte + $NESur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
    $NEcentro2 = ($NEEste + $NEOeste) * 0.5;

    /* Noroeste */
    $NOnorte = $this->alojamientosRepository->findMaparegiones('Noroeste', 'latitud desc', '1');
    $NONorte = $NOnorte[0]['latitud'];

    $NOsur = $this->alojamientosRepository->findMaparegiones('Noroeste', 'latitud', '1');
    $NOSur = $NOsur[0]['latitud'];

    $NOeste = $this->alojamientosRepository->findMaparegiones('Noroeste', 'longitud desc', '1');
    $NOEste = $NOeste[0]['longitud'];

    $NOoeste = $this->alojamientosRepository->findMaparegiones('Noroeste', 'longitud', '1');
    $NOOeste = $NOoeste[0]['longitud'];

    $NOcentro1 = ($NONorte + $NOSur) * 0.5 * 1.1; //Subimos un 10% pues no sale centrado verticalmente
    $NOcentro2 = ($NOEste + $NOOeste) * 0.5;

    /* Resultados Regiones */
    $resultNO = $this->alojamientosRepository->findMaparegiones('Noroeste', 'id', '9999');
    $resultNE = $this->alojamientosRepository->findMaparegiones('Noreste', 'id', '9999');
    $resultC = $this->alojamientosRepository->findMaparegiones('Cuyo', 'id', '9999');
    $resultP = $this->alojamientosRepository->findMaparegiones('Pampa', 'id', '9999');
    $resultP1 = $this->alojamientosRepository->findMaparegiones('Patagonia1', 'id', '9999');
    $resultP2 = $this->alojamientosRepository->findMaparegiones('Patagonia2', 'id', '9999');

    /*** fin Coordenadas ***/

    $myArray = array('centro1' => $centro1, 'centro2' => $centro2, 'P1centro1' => $P1centro1, 'P1centro2' => $P1centro2, 'Pcentro1' => $Pcentro1, 'Pcentro2' => $Pcentro2, 'Ccentro1' => $Ccentro1, 'Ccentro2' => $Ccentro2, 'NEcentro1' => $NEcentro1, 'NEcentro2' => $NEcentro2, 'NOcentro1' => $NOcentro1, 'NOcentro2' => $NOcentro2, 'resultP1' => $resultP1, 'resultP2' => $resultP2, 'resultP' => $resultP, 'resultC' => $resultC, 'resultNE' => $resultNE, 'resultNO' => $resultNO);

    return $myArray;
  }
}
