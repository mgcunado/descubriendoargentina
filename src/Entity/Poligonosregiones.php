<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poligonosregiones
 *
 * @ORM\Table(name="poligonosRegiones")
 * @ORM\Entity(repositoryClass="App\Repository\AlojamientosRepository") 
 */
class Poligonosregiones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float", precision=8, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $latitud = '0.000000';

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float", precision=8, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $longitud = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=40, nullable=false)
     */
    private $region = '';


    
    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id)
    {
        $this->id = $id;
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
}
