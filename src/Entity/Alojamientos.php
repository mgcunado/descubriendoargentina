<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alojamientos
 *
 * @ORM\Table(name="alojamientos")
 * @ORM\Entity(repositoryClass="App\Repository\AlojamientosRepository")
 */
class Alojamientos
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
     * @ORM\Column(name="direccion", type="string", length=200, nullable=false)
     */
    private $direccion = '';

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=200, nullable=false)
     */
    private $telefono = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email = '';

    /**
     * @var int
     *
     * @ORM\Column(name="emailvalido", type="integer", nullable=false)
     */
    private $emailvalido = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="sitioweb", type="string", length=200, nullable=true)
     */
    private $sitioweb = '';

    /**
     * @var int
     *
     * @ORM\Column(name="codigoerror", type="integer", nullable=false)
     */
    private $codigoerror = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dispo", type="string", length=2, nullable=true, options={"default"="no"})
     */
    private $dispo = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tarifas", type="string", length=2, nullable=true, options={"default"="no"})
     */
    private $tarifas = 'no';

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=200, nullable=false)
     */
    private $tipo = '';

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=200, nullable=false)
     */
    private $categoria = '';

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=200, nullable=false)
     */
    private $localidad = '';

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=200, nullable=false)
     */
    private $provincia = '';

    /**
     * @var string
     *
     * @ORM\Column(name="barrio", type="string", length=60, nullable=true)
     */
    private $barrio = '';

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
    private $insertado;

    public function __construct()
    {
        $this->insertado = new \DateTime();
        $this->enviado = false;
    }

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
     * Get direccion.
     *
     * @return direccion.
     */
    public function getDireccion(): String
    {
        return $this->direccion;
    }

    /**
     * Set direccion.
     *
     * @param direccion the value to set.
     * @param string $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * Get telefono.
     *
     * @return telefono.
     */
    public function getTelefono(): String
    {
        return $this->telefono;
    }

    /**
     * Set telefono.
     *
     * @param telefono the value to set.
     * @param string $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * Get email.
     *
     * @return email.
     */
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param email the value to set.
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * Get emailvalido.
     *
     * @return emailvalido.
     */
    public function getEmailvalido(): Int
    {
        return $this->emailvalido;
    }

    /**
     * Set emailvalido.
     *
     * @param emailvalido the value to set.
     * @param int $emailvalido
     */
    public function setEmailvalido($emailvalido): void
    {
        $this->emailvalido = $emailvalido;
    }

    /**
     * Get sitioweb.
     *
     * @return sitioweb.
     */
    public function getSitioweb(): String
    {
        return $this->sitioweb;
    }

    /**
     * Set sitioweb.
     *
     * @param sitioweb the value to set.
     * @param string $sitioweb
     */
    public function setSitioweb($sitioweb): void
    {
        $this->sitioweb = $sitioweb;
    }

    /**
     * Get codigoerror.
     *
     * @return codigoerror.
     */
    public function getCodigoerror(): Int
    {
        return $this->codigoerror;
    }

    /**
     * Set codigoerror.
     *
     * @param codigoerror the value to set.
     * @param int $codigoerror
     */
    public function setCodigoerror($codigoerror): void
    {
        $this->codigoerror = $codigoerror;
    }

    /**
     * Get dispo.
     *
     * @return dispo.
     */
    public function getDispo(): ?String
    {
        return $this->dispo;
    }

    /**
     * Set dispo.
     *
     * @param dispo the value to set.
     * @param string $dispo
     */
    public function setDispo($dispo): void
    {
        $this->dispo = $dispo;
    }

    /**
     * Get tarifas.
     *
     * @return tarifas.
     */
    public function getTarifas(): ?String
    {
        return $this->tarifas;
    }

    /**
     * Set tarifas.
     *
     * @param tarifas the value to set.
     * @param string $tarifas
     */
    public function setTarifas($tarifas): void
    {
        $this->tarifas = $tarifas;
    }

    /**
     * Get tipo.
     *
     * @return tipo.
     */
    public function getTipo(): String
    {
        return $this->tipo;
    }

    /**
     * Set tipo.
     *
     * @param tipo the value to set.
     * @param string $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * Get categoria.
     *
     * @return categoria.
     */
    public function getCategoria(): String
    {
        return $this->categoria;
    }

    /**
     * Set categoria.
     *
     * @param categoria the value to set.
     * @param string $categoria
     */
    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
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
     * Get barrio.
     *
     * @return barrio.
     */
    public function getBarrio(): String
    {
        return $this->barrio;
    }

    /**
     * Set barrio.
     *
     * @param barrio the value to set.
     * @param string $barrio
     */
    public function setBarrio($barrio): void
    {
        $this->barrio = $barrio;
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
