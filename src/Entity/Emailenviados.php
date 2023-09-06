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
     * Get direcciones.
     *
     * @return direcciones.
     */
    public function getDirecciones(): ArrayCollection
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
     * Get numEmails.
     *
     * @return numEmails.
     */
    public function getNumEmails(): Int
    {
        return $this->numEmails;
    }
    
    /**
     * Set numEmails.
     *
     * @param numEmails the value to set.
     * @param int $numEmails
     */
    public function setNumEmails($numEmails): void
    {
        $this->numEmails = $numEmails;
    }
    
    /**
     * Get enviado.
     *
     * @return enviado.
     */
    public function getEnviado(): Bool
    {
        return $this->enviado;
    }
    
    /**
     * Set enviado.
     *
     * @param enviado the value to set.
     * @param bool $enviado
     */
    public function setEnviado($enviado): void
    {
        $this->enviado = $enviado;
    }
    
    /**
     * Get insertado.
     *
     * @return insertado.
     */
    public function getInsertado(): \DateTime
    {
        return $this->insertado;
    }
    
    /**
     * Set insertado.
     *
     * @param insertado the value to set.
     * @param \DateTime $insertado
     */
    public function setInsertado($insertado): void
    {
        $this->insertado = $insertado;
    }
}
