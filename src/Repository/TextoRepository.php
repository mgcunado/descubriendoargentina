<?php

namespace App\Repository;

use App\Entity\JosContent;
use App\Entity\Excursiones;
use App\Entity\Termas;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/*use Doctrine\Common\ClassLoader;
require '/var/www/symfony/argentina/vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader('DoctrineExtensions', '/var/www/symfony/argentina/vendor/beberlei/src/Query/Mysql');
$classLoader->register();*/

class TextoRepository extends ServiceEntityRepository
{
  public function __construct(RegistryInterface $registry)
  {
    parent::__construct($registry, JosContent::class);
    parent::__construct($registry, Excursiones::class);
    parent::__construct($registry, Termas::class);
  }

  // ** Alojamientos Principales **
  /**
   * @return mixed
   */
  public function findAlojamientosprincipales()
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.centroTuristico AS centroturistico, s.latitud AS latitud, s.longitud AS longitud, s.provincia AS provincia, s.region AS region, s.alias AS alias
      FROM App:TablaEnlacesCentros s
      WHERE s.centroTuristico != :centroTuristico and s.latitud != 0
      ORDER BY s.region, s.provincia, s.centroTuristico');
    $consulta->setParameter('centroTuristico', '');
    return $consulta->getResult();
  }

  /**
   * @param string $region
   * @param string $alojamientosfaltantes
   * @return mixed
   */
  public function findAlojamientosprincipales2($region, $alojamientosfaltantes)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.centroTuristico AS centroTuristico, s.latitud AS latitud, s.longitud AS longitud, s.provincia AS provincia, s.region AS region, s.alias AS alias
      FROM App:TablaEnlacesCentros s
      WHERE s.centroTuristico != :centroTuristico and s.latitud != 0 and s.region = :region and s.alias not in (:alias)
      ORDER BY s.region, s.provincia, s.centroTuristico');
    $consulta->setParameter('centroTuristico', '');
    $consulta->setParameter('region', $region);
    $consulta->setParameter('alias', $alojamientosfaltantes);
    return $consulta->getResult();
  }

  // ** Regiones, Provincias y Centros Turísticos **
  /**
   * @param int $ide
   * @return mixed
   */
  public function findTextos($ide)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.title AS lugarturistico, s.alias AS alias, s.introtext AS introtext, s.textocompleto AS texto, s.id AS id
      FROM App:JosContent s
      WHERE s.alias = :alias
      ORDER BY s.id');
    $consulta->setParameter('alias', $ide);
    return $consulta->getResult();
  }

  // ** Pesca Deportiva en Centros Turísticos **
  /**
   * @param string $localitySlug
   * @return mixed
   */
  public function findPescadeportiva($localitySlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.localidad AS lugarturistico, s.provincia AS provincia, s.region AS region, s.descripcion AS descripcion, s.id AS id
      FROM App:PescaDeportiva s
      WHERE s.localidad = :localidad
      ORDER BY s.id');
    $consulta->setParameter('localidad', $localitySlug);
    return $consulta->getResult();
  }

  // ** Pesca Deportiva en Provincias **
  /**
   * @param string $provinceSlug
   * @return mixed
   */
  public function findPescaprovincias($provinceSlug)
  {
    $em = $this->getEntityManager();

    $provincia = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:TablaEnlacesCentros s
      WHERE s.alias = :alias
      ');
    $provincia->setParameter('alias', $provinceSlug);
    $provinci = $provincia->getResult();

    $consulta = $em->createQuery('
      SELECT s.localidad AS localidad, s.provincia AS provincia, s.region AS region, s.descripcion AS descripcion, s.id AS id
      FROM App:PescaDeportiva s
      WHERE s.provincia = :provincia and s.localidad = :localidad
      ORDER BY s.id');
    $consulta->setParameter('localidad', '');
    $consulta->setParameter('provincia', $provinci);
    return $consulta->getResult();
  }

  // ** Excursiones **
  /**
   * @param int $ide
   * @return mixed
   */
  public function findExcursiones($ide)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.title AS titulo, s.texto AS texto, s.referencia AS referencia, j.id AS id, j.alias AS alias, j.title AS lugarturistico
      FROM App:Excursiones s, App:JosContent j
      WHERE j.alias = :alias and s.referencia = j.id
      ORDER BY j.id');
    $consulta->setParameter('alias', $ide);
    return $consulta->getResult();
  }

  // ** Galería de Imágenes **
  /**
   * @param int $ide
   * @return mixed
   */
  public function findGaleria($ide)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.alias AS alias, s.name AS lugarturistico, d.descripcion AS descripcion, d.nombre AS nombre
      FROM App:JosMenu s, App:DescripcionImages d
      WHERE s.alias = :alias and d.nombre like :nombre
      ORDER BY s.id');
    $consulta->setParameter('alias', $ide);
    $consulta->setParameter('nombre', $ide . '%');

    return $consulta->getResult();
  }

  // ** Termas **
  /**
   * @return mixed
   */
  public function findProvinciastermas()
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:Termas s
      GROUP BY s.provincia
      ORDER BY s.provincia');
    return $consulta->getResult();
  }

  /**
   * @param string $provinceSlug
   * @return mixed
   */
  public function findTermas($provinceSlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia, s.nombre AS nombre, s.direccion AS direccion, s.localidad AS localidad, s.descripcion AS descripcion
      FROM App:Termas s
      WHERE s.provincia like :provincia
      ORDER BY s.provincia, s.localidad');
    $consulta->setParameter('provincia', $provinceSlug);
    return $consulta->getResult();
  }

  // ** Casinos **
  /**
   * @return mixed
   */
  public function findProvinciascasinos()
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:Casinos s
      GROUP BY s.provincia
      ORDER BY s.provincia');
    return $consulta->getResult();
  }

  /**
   * @param string $provinceSlug
   * @return mixed
   */
  public function findCasinos($provinceSlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia, s.nombre AS nombre, s.direccion AS direccion, s.localidad AS localidad, s.telefono AS telefono, s.siteweb AS siteweb, s.descripcion AS descripcion
      FROM App:Casinos s
      WHERE s.provincia like :provincia
      ORDER BY s.provincia, s.localidad');
    $consulta->setParameter('provincia', $provinceSlug);
    return $consulta->getResult();
  }

  // ** Rutadelvino **
  /**
   * @return mixed
   */
  public function findProvinciasrutadelvino()
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:Rutadelvino s
      GROUP BY s.provincia
      ORDER BY s.provincia');
    return $consulta->getResult();
  }

  /**
   * @param string $provinceSlug
   * @return mixed
   */
  public function findRutadelvino($provinceSlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia, s.nombre AS nombre, s.descripcion AS descripcion
      FROM App:Rutadelvino s
      WHERE s.provincia like :provincia
      ORDER BY s.provincia');
    $consulta->setParameter('provincia', $provinceSlug);
    return $consulta->getResult();
  }

  // ** Trenesturisticos **
  /**
   * @return mixed
   */
  public function findProvinciastrenesturisticos()
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:Trenesturisticos s
      GROUP BY s.provincia
      ORDER BY s.provincia');
    return $consulta->getResult();
  }

  /**
   * @param string $provinceSlug
   * @return mixed
   */
  public function findTrenesturisticos($provinceSlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia, s.nombre AS nombre, s.descripcion AS descripcion
      FROM App:Trenesturisticos s
      WHERE s.provincia like :provincia
      ORDER BY s.provincia');
    $consulta->setParameter('provincia', $provinceSlug);
    return $consulta->getResult();
  }

  // ** Tabla de distancias **
  /**
   * @param string $localitySlug
   * @return mixed
   */
  public function findTabladistancias1($localitySlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.centroTuristico AS lugarturistico, s.latitud AS latitud, s.longitud AS longitud
      FROM App:TablaEnlacesCentros s
      WHERE s.alias = :alias and s.latitud != 0
      ORDER BY s.oid');
    $consulta->setParameter('alias', $localitySlug);
    return $consulta->getResult();
  }

  /**
   * @param string $localitySlug
   * @param float $latitud1
   * @param float $longitud1
   * @return mixed
   */
  public function findTabladistancias2($localitySlug, $latitud1, $longitud1)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery("
      SELECT s.alias AS alias, s.centroTuristico AS lugarturistico, s.provincia AS provincia, s.region AS region, s.latitud AS latitud, s.longitud AS longitud, ((acos((sin('$latitud1' * 0.01745329252) * sin(s.latitud * 0.01745329252)) + (cos('$latitud1' * 0.01745329252) * cos(s.latitud * 0.01745329252) * cos(('$longitud1' - s.longitud) * 0.01745329252))) * 57.29577951308) * 111.302) as distancia
      FROM App:TablaEnlacesCentros s
      WHERE s.alias != :alias and s.latitud != 0 and s.longitud != 0
      ORDER BY distancia");
    $consulta->setParameter('alias', $localitySlug);
    return $consulta->getResult();
  }

  /**
   * @param string $regionSlug
   * @return mixed
   */
  public function findProvincesByRegion($regionSlug)
  {
    $em = $this->getEntityManager();

    $consulta = $em->createQuery('
      SELECT s.provincia AS provincia, s.alias AS alias, s.region AS region
      FROM App:TablaEnlacesCentros s
      WHERE s.region = :region and s.provincia != :provincia and s.centroTuristico = :centroTuristico
      GROUP BY s.provincia
      ORDER BY s.provincia');
    // $consulta->setParameter('alias', $regionSlug);
    $consulta->setParameter('provincia', '');
    $consulta->setParameter('centroTuristico', '');
    $consulta->setParameter('region', $regionSlug);
    return $consulta->getResult();
  }

  /**
   * @param string $provinceSlug
   * @return mixed
   */
  public function touristCenterByProvince($provinceSlug)
  {
    $em = $this->getEntityManager();

    $provincia = $em->createQuery('
      SELECT s.provincia AS provincia
      FROM App:TablaEnlacesCentros s
      WHERE s.alias = :alias
      ');
    $provincia->setParameter('alias', $provinceSlug);
    //return $provincia->getResult();
    $provinci = $provincia->getResult();

    $consulta = $em->createQuery('
      SELECT s.centroTuristico AS centroTuristico, s.alias AS alias, s.provincia AS provincia, s.region AS region
      FROM App:TablaEnlacesCentros s
      WHERE s.provincia = :provincia and s.centroTuristico != :centroTuristico
      GROUP BY s.centroTuristico
      ORDER BY s.centroTuristico');
    // $consulta->setParameter('alias', $regionSlug);
    $consulta->setParameter('centroTuristico', '');
    $consulta->setParameter('provincia', $provinci);
    return $consulta->getResult();
  }
}
