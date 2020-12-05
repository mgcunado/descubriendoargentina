<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Excursiones
 *
 * @ORM\Table(name="excursiones")
 * @ORM\Entity(repositoryClass="App\Repository\TextoRepository")
 */
class Excursiones
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
     * @var int
     *
     * @ORM\Column(name="referencia", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="bloque", type="string", length=255, nullable=false)
     */
    private $bloque = '';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", length=16777215, nullable=false)
     */
    private $texto;


    
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
     * Get referencia.
     *
     * @return referencia.
     */
    public function getReferencia()
    {
        return $this->referencia;
    }
    
    /**
     * Set referencia.
     *
     * @param referencia the value to set.
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }
    
    /**
     * Get bloque.
     *
     * @return bloque.
     */
    public function getBloque()
    {
        return $this->bloque;
    }
    
    /**
     * Set bloque.
     *
     * @param bloque the value to set.
     */
    public function setBloque($bloque)
    {
        $this->bloque = $bloque;
    }
    
    /**
     * Get title.
     *
     * @return title.
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set title.
     *
     * @param title the value to set.
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Get texto.
     *
     * @return texto.
     */
    public function getTexto()
    {
        return $this->texto;
    }
    
    /**
     * Set texto.
     *
     * @param texto the value to set.
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }
}
