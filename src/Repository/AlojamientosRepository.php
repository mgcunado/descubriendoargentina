<?php

namespace App\Repository;

use App\Entity\Poligonosregiones;
use App\Entity\Alojamientos;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AlojamientosRepository extends ServiceEntityRepository
{
  public function __construct(RegistryInterface $registry)
  {
    parent::__construct($registry, Poligonosregiones::class);
    parent::__construct($registry, Alojamientos::class);
  }

  // ** Alojamientos **
  /**
   * @param string $sluggg
   * @return mixed
   */
  public function findAlojamiento0($sluggg)
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.centroTuristico AS centroTuristico, s.provincia AS provincia, s.latitud AS latitud, s.longitud AS longitud
      FROM App:TablaEnlacesCentros s
      WHERE s.alias = :alias and s.latitud != :latitud ');
    $consulta->setParameter('alias', $sluggg);
    $consulta->setParameter('latitud', 0);
    return $consulta->getResult();
  }

  //qryt1 + qryt2 en el original => no tenemos en cuenta las tarifas
  /**
   * @param string $localidad
   * @param string $provincia
   * @return mixed
   */
  public function findAlojamientot12($localidad,$provincia)
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.tipo AS tipo
      FROM App:Alojamientos s
      WHERE s.localidad = :localidad and s.provincia = :provincia and s.email != :email and s.emailvalido = :emailvalido
      GROUP BY s.tipo
      ORDER BY tipo
      ');
    // Sustituido de momento: ORDER BY count(tipo) desc

    $consulta->setParameter('localidad', $localidad);
    $consulta->setParameter('provincia', $provincia);
    $consulta->setParameter('email', '');
    $consulta->setParameter('emailvalido', 1);

    return $consulta->getResult();
  }

  /* //qrw en el original => Calculamos producto: diferentes tipos x categorias
   public function findAlojamientow($localidad,$provincia)
   {
      $em = $this->getEntityManager();
      $consulta = $em->createQuery('
            SELECT s.tipo AS tipo, (count(DISTINCT s.categoria)) as sumacat
              FROM App:Alojamientos s
              WHERE s.localidad = :localidad and s.provincia = :provincia and s.email != :email and s.emailvalido = :emailvalido
              GROUP BY s.tipo
               ');
        $consulta->setParameter('localidad', $localidad);
        $consulta->setParameter('provincia', $provincia);
        $consulta->setParameter('email', '');
        $consulta->setParameter('emailvalido', 1);

        return $consulta->getResult();
    }*/

  //qr2 en el original
  /**
   * @param string $localidad
   * @param string $provincia
   * @param string $sluggg
   * @return mixed
   */
  public function findAlojamiento2($localidad,$provincia, $sluggg)
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.tipo AS tipo, s.categoria AS categoria, j.alias AS alias, j.title AS lugarturistico
      FROM App:Alojamientos s, App:JosContent j
      WHERE s.localidad = :localidad and s.provincia = :provincia and s.email != :email and s.emailvalido = :emailvalido and j.alias = :alias
      GROUP BY s.tipo, s.categoria
      ORDER BY s.categoria desc
      ');
    $consulta->setParameter('localidad', $localidad);
    $consulta->setParameter('provincia', $provincia);
    $consulta->setParameter('email', '');
    $consulta->setParameter('emailvalido', 1);
    $consulta->setParameter('alias', $sluggg);

    return $consulta->getResult();
  }

  //qr3 en el original
  /**
   * @param string $localidad
   * @param string $provincia
   * @return mixed
   */
  public function findAlojamiento3($localidad,$provincia)
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.id AS id, s.email AS email, s.localidad AS localidad, s. provincia AS provincia, s.direccion AS direccion, s.telefono AS telefono, s.sitioweb AS sitioweb, s.nombre AS nombre, s.tipo AS tipo, s.categoria AS categoria, s.enviado AS enviado, s.codigoerror AS codigoerror
      FROM App:Alojamientos s
      WHERE s.localidad = :localidad and s.provincia = :provincia and s.email != :email and s.emailvalido = :emailvalido
      ORDER BY s.tipo, s.categoria desc, s.nombre
      ');
    //Pendiente: ORDER BY count(s.tipo) desc, s.categoria desc, s.nombre

    $consulta->setParameter('localidad', $localidad);
    $consulta->setParameter('provincia', $provincia);
    $consulta->setParameter('email', '');
    $consulta->setParameter('emailvalido', 1);

    //$consulta->setMaxResults(49);

    return $consulta->getResult();
  }

  /* Alojamiento en Localidades Cercanas */
  //qry2(dentro de Localidades Cercanas) en el original
  /**
   * @param float $latitud1
   * @param float $longitud1
    @return mixed
   */
  public function findLocalidades2aux($latitud1, $longitud1)
  {
    $em = $this->getEntityManager();

    $localidademailvalido = $em->createQuery('
      SELECT s.localidad AS localidad
      FROM App:Alojamientos s
      WHERE s.email != :email and s.emailvalido = :emailvalido
      ');
    $localidademailvalido->setParameter('email', '');
    $localidademailvalido->setParameter('emailvalido', 1);
    $localidadesemailvalido = $localidademailvalido->getResult();

    $consulta = $em->createQuery("
      SELECT s.localidad AS localidad, s.provincia AS provincia, s.region AS region, s.latitud AS latitud, s.longitud AS longitud, ((acos((sin('$latitud1' * 0.01745329252) * sin(s.latitud * 0.01745329252)) + (cos('$latitud1' * 0.01745329252) * cos(s.latitud * 0.01745329252) * cos(('$longitud1' - s.longitud) * 0.01745329252))) * 57.29577951308) * 111.302) as distancia
      FROM App:TablaEnlacesCentrosAux s
      WHERE s.latitud != 0 and s.longitud != 0 and ((acos((sin('$latitud1' * 0.01745329252) * sin(s.latitud * 0.01745329252)) + (cos('$latitud1' * 0.01745329252) * cos(s.latitud * 0.01745329252) * cos(('$longitud1' - s.longitud) * 0.01745329252))) * 57.29577951308) * 111.302) < 50 and s.localidad in (:localidad)
      ORDER BY distancia");
    $consulta->setParameter('localidad', $localidadesemailvalido);
    return $consulta->getResult();
  }

  /**
   * @param string $localidad
   * @param string $provincia
   * @return mixed
   */
  public function findAlojamiento2aux($localidad,$provincia)
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.localidad AS localidad, s.tipo AS tipo, s.categoria AS categoria
      FROM App:Alojamientos s
      WHERE s.localidad = :localidad and s.provincia = :provincia and s.email != :email and s.emailvalido = :emailvalido
      GROUP BY s.tipo, s.categoria
      ORDER BY s.categoria desc
      ');
    $consulta->setParameter('localidad', $localidad);
    $consulta->setParameter('provincia', $provincia);
    $consulta->setParameter('email', '');
    $consulta->setParameter('emailvalido', 1);

    return $consulta->getResult();
  }

  /*:::: FIN Alojamiento en Localidades Cercanas ::::*/

  // ** Mapa Regiones **
  /**
   * @param string $ide
   * @param mixed $order
   * @param int $limit
   * @return mixed
   */
  public function findMaparegiones($ide, $order, $limit)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s, s.latitud AS latitud, s.longitud AS longitud
      FROM App:Poligonosregiones s
      WHERE s.region like :region
      ORDER BY s.'.$order);
    $consulta->setParameter('region', $ide);
    $consulta->setMaxResults($limit);
    return $consulta->getResult();
  }

  // *** Sonata Admin ***
  /**
   * @return mixed
   */
  public function findProvincias()
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:Alojamientos s
      WHERE s.provincia != :provincia
      GROUP BY s.provincia
      ORDER BY s.provincia
      ');
    $consulta->setParameter('provincia', '');

    return $consulta->getResult();
  }

  /**
   * @return mixed
   */
  public function findTipos()
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.tipo AS tipo
      FROM App:Alojamientos s
      WHERE s.tipo != :tipo
      GROUP BY s.tipo
      ORDER BY s.tipo
      ');
    $consulta->setParameter('tipo', '');

    return $consulta->getResult();
  }

  /**
   * @return mixed
   */
  public function findCategorias()
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.categoria AS categoria
      FROM App:Alojamientos s
      GROUP BY s.categoria
      ORDER BY s.categoria
      ');

    return $consulta->getResult();
  }

  /**
   * @return mixed
   */
  public function findBarrios()
  {
    $em = $this->getEntityManager();
    $consulta = $em->createQuery('
      SELECT s.barrio AS barrio
      FROM App:Alojamientos s
      WHERE s.localidad = :localidad AND s.provincia = :provincia
      GROUP BY s.barrio
      ORDER BY s.barrio
      ');

    $consulta->setParameter('localidad', 'Capital Federal');
    $consulta->setParameter('provincia', 'Buenos Aires');

    return $consulta->getResult();
  }
}

