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
     * Get titulo.
     *
     * @return titulo.
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
    
    /**
     * Set titulo.
     *
     * @param titulo the value to set.
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
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
     * Get descripcion.
     *
     * @return descripcion.
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
     * Set descripcion.
     *
     * @param descripcion the value to set.
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
