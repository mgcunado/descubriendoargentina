<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="descripcion_images")
 * @ORM\Entity(repositoryClass="App\Repository\JosMenuRepository")
 */
class DescripcionImages
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
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false)
     */
    private $nombre = '';

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=16777215, nullable=false)
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
     * @return id
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
