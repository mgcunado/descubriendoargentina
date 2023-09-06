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
    public function getId(): Int
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param id the value to set.
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
}
