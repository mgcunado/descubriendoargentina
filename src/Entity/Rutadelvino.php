<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rutadelvino
 *
 * @ORM\Table(name="rutadelvino")
 * @ORM\Entity(repositoryClass="App\Repository\TextoRepository")
 */
class Rutadelvino
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
     * @ORM\Column(name="nombre", type="string", length=80, nullable=false)
     */
    private $nombre = '';

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
     * Get nombre.
     *
     * @return nombre.
     */
    public function getNombre(): String
    {
        return $this->nombre;
    }

    /**
     * Set nombre.
     *
     * @param nombre the value to set.
     * @param string $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
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
