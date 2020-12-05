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
    public function getOid()
    {
        return $this->oid;
    }
    
    /**
     * Set oid.
     *
     * @param oid the value to set.
     */
    public function setOid($oid)
    {
        $this->oid = $oid;
    }
    
    /**
     * Get localidad.
     *
     * @return localidad.
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }
    
    /**
     * Set localidad.
     *
     * @param localidad the value to set.
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }
    
    /**
     * Get provincia.
     *
     * @return provincia.
     */
    public function getProvincia()
    {
        return $this->provincia;
    }
    
    /**
     * Set provincia.
     *
     * @param provincia the value to set.
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }
    
    /**
     * Get region.
     *
     * @return region.
     */
    public function getRegion()
    {
        return $this->region;
    }
    
    /**
     * Set region.
     *
     * @param region the value to set.
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }
    
    /**
     * Get latitud.
     *
     * @return latitud.
     */
    public function getLatitud()
    {
        return $this->latitud;
    }
    
    /**
     * Set latitud.
     *
     * @param latitud the value to set.
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }
    
    /**
     * Get longitud.
     *
     * @return longitud.
     */
    public function getLongitud()
    {
        return $this->longitud;
    }
    
    /**
     * Set longitud.
     *
     * @param longitud the value to set.
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }
}
