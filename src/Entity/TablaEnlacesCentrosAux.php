<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TablaEnlacesCentrosAux
 *
 * @ORM\Table(name="tabla_enlaces_centros_aux")
 * @ORM\Entity(repositoryClass="App\Repository\TextoRepository")
 */
class TablaEnlacesCentrosAux
{
    /**
     * @var int
     *
     * @ORM\Column(name="oid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oid;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=80, nullable=false)
     */
    private $localidad = '';

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=80, nullable=false)
     */
    private $provincia = '';

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=80, nullable=false)
     */
    private $region = '';

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitud = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitud = '0';

    /**
     * Get oid.
     *
     * @return oid.
     */
    public function getOid(): Int
    {
        return $this->oid;
    }

    /**
     * Set oid.
     *
     * @param oid the value to set.
     * @param int $oid
     */
    public function setOid($oid): void
    {
        $this->oid = $oid;
    }

    /**
     * Get localidad.
     *
     * @return localidad.
     */
    public function getLocalidad(): String
    {
        return $this->localidad;
    }

    /**
     * Set localidad.
     *
     * @param localidad the value to set.
     * @param string $localidad
     */
    public function setLocalidad($localidad): void
    {
        $this->localidad = $localidad;
    }

    /**
     * Get provincia.
     *
     * @return provincia.
     */
    public function getProvincia(): String
    {
        return $this->provincia;
    }

    /**
     * Set provincia.
     *
     * @param provincia the value to set.
     * @param string $provincia
     */
    public function setProvincia($provincia): void
    {
        $this->provincia = $provincia;
    }

    /**
     * Get region.
     *
     * @return region.
     */
    public function getRegion(): String
    {
        return $this->region;
    }

    /**
     * Set region.
     *
     * @param region the value to set.
     * @param string $region
     */
    public function setRegion($region): void
    {
        $this->region = $region;
    }

    /**
     * Get latitud.
     *
     * @return latitud.
     */
    public function getLatitud(): Float
    {
        return $this->latitud;
    }

    /**
     * Set latitud.
     *
     * @param latitud the value to set.
     * @param float $latitud
     */
    public function setLatitud($latitud): void
    {
        $this->latitud = $latitud;
    }

    /**
     * Get longitud.
     *
     * @return longitud.
     */
    public function getLongitud(): Float
    {
        return $this->longitud;
    }

    /**
     * Set longitud.
     *
     * @param longitud the value to set.
     * @param float $longitud
     */
    public function setLongitud($longitud): void
    {
        $this->longitud = $longitud;
    }
}
