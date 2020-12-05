<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * TablaEnlacesCentros
 *
 * @ORM\Table(name="tabla_enlaces_centros")
 * @ORM\Entity(repositoryClass="App\Repository\TextoRepository")
 */
class TablaEnlacesCentros
{
    /**
     * @var int
     *
     * @ORM\Column(name="oid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oid;

    /**
     * @var string
     *
     * @ORM\Column(name="centro_turistico", type="string", length=80, nullable=false)
     */
    private $centroTuristico = '';

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=80, nullable=false)
     */
    private $alias = '';
    

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
     * @var int
     *
     * @ORM\Column(name="enlace_id", type="integer", nullable=false)
     */
    private $enlaceId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="itemid", type="integer", nullable=false)
     */
    private $itemid = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitud = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitud = '0';


    
    /**
     * Get oid.
     *
     * @return oid.
     */
    public function getOid()
    {
        return $this->oid;
    }
    
    /**
     * Set oid.
     *
     * @param oid the value to set.
     */
    public function setOid($oid)
    {
        $this->oid = $oid;
    }
    
    /**
     * Get centroTuristico.
     *
     * @return centroTuristico.
     */
    public function getCentroTuristico()
    {
        return $this->centroTuristico;
    }
    
    /**
     * Set centroTuristico.
     *
     * @param centroTuristico the value to set.
     */
    public function setCentroTuristico($centroTuristico)
    {
        $this->centroTuristico = $centroTuristico;
    }

    /**
     * Get alias.
     *
     * @return alias.
     */
    public function getAlias()
    {
        return $this->alias;
    }
    
    /**
     * Set alias.
     *
     * @param alias the value to set.
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
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
     * Get enlaceId.
     *
     * @return enlaceId.
     */
    public function getEnlaceId()
    {
        return $this->enlaceId;
    }
    
    /**
     * Set enlaceId.
     *
     * @param enlaceId the value to set.
     */
    public function setEnlaceId($enlaceId)
    {
        $this->enlaceId = $enlaceId;
    }
    
    /**
     * Get itemid.
     *
     * @return itemid.
     */
    public function getItemid()
    {
        return $this->itemid;
    }
    
    /**
     * Set itemid.
     *
     * @param itemid the value to set.
     */
    public function setItemid($itemid)
    {
        $this->itemid = $itemid;
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
}
