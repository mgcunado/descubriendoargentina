<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PescaDeportiva
 *
 * @ORM\Table(name="pesca_deportiva")
 * @ORM\Entity(repositoryClass="App\Repository\TextoRepository")
 */
class PescaDeportiva
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
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=80, nullable=false)
     */
    private $titulo = '';

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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     */
    private $descripcion;

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
     * Get titulo.
     *
     * @return titulo.
     */
    public function getTitulo(): String
    {
        return $this->titulo;
    }

    /**
     * Set titulo.
     *
     * @param titulo the value to set.
     * @param string $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
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
     * Get descripcion.
     *
     * @return descripcion.
     */
    public function getDescripcion(): String
    {
        return $this->descripcion;
    }

    /**
     * Set descripcion.
     *
     * @param descripcion the value to set.
     * @param string $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }
}
