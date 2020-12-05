<?php
namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Emailenviados
 *
 * @ORM\Table(name="emailenviados")
 * @ORM\Entity
 */
class Emailenviados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

       /* @ORM\Column(name="direcciones", type="simple_array", length=20000, nullable=false) */
    private $direcciones;

    public function __construct()
    {
        $this->direcciones = new ArrayCollection();
    }    

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=80, nullable=false)
     */
    private $localidad;

    /**
     * @var int
     *
     * @ORM\Column(name="num_emails", type="integer", nullable=false)
     */
    private $numEmails = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="enviado", type="boolean", nullable=false, options={"default"=false})
     */
    private $enviado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insertado", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $insertado = 'CURRENT_TIMESTAMP';


    
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
     * Get direcciones.
     *
     * @return direcciones.
     */
    public function getDirecciones()
    {
        return $this->direcciones;
    }

    
    /*
     * Set direcciones.
     *
     * @param direcciones the value to set.
     *
    public function setDirecciones($direcciones)
    {
        $this->direcciones = $direcciones;
    }*/
    
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
     * Get numEmails.
     *
     * @return numEmails.
     */
    public function getNumEmails()
    {
        return $this->numEmails;
    }
    
    /**
     * Set numEmails.
     *
     * @param numEmails the value to set.
     */
    public function setNumEmails($numEmails)
    {
        $this->numEmails = $numEmails;
    }
    
    /**
     * Get enviado.
     *
     * @return enviado.
     */
    public function getEnviado()
    {
        return $this->enviado;
    }
    
    /**
     * Set enviado.
     *
     * @param enviado the value to set.
     */
    public function setEnviado($enviado)
    {
        $this->enviado = $enviado;
    }
    
    /**
     * Get insertado.
     *
     * @return insertado.
     */
    public function getInsertado()
    {
        return $this->insertado;
    }
    
    /**
     * Set insertado.
     *
     * @param insertado the value to set.
     */
    public function setInsertado($insertado)
    {
        $this->insertado = $insertado;
    }
}
