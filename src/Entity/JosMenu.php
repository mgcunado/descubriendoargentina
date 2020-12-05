<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="jos_menu")
 * @ORM\Entity(repositoryClass="App\Repository\JosMenuRepository")
 */
class JosMenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="menutype", type="string", length=75, nullable=true)
     */
    private $menutype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=false)
     */
    private $alias = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="link", type="text", length=65535, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="parent", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $parent = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="componentid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $componentid = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sublevel", type="integer", nullable=true)
     */
    private $sublevel = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordering", type="integer", nullable=true)
     */
    private $ordering = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="checked_out", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $checkedOut = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checked_out_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $checkedOutTime = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="pollid", type="integer", nullable=false)
     */
    private $pollid = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="browserNav", type="boolean", nullable=true)
     */
    private $browsernav = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="access", type="boolean", nullable=false)
     */
    private $access = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="utaccess", type="boolean", nullable=false)
     */
    private $utaccess = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $lft = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $rgt = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="home", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $home = '0';


    
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
     * Get menutype.
     *
     * @return menutype.
     */
    public function getMenutype()
    {
        return $this->menutype;
    }
    
    /**
     * Set menutype.
     *
     * @param menutype the value to set.
     */
    public function setMenutype($menutype)
    {
        $this->menutype = $menutype;
    }
    
    /**
     * Get name.
     *
     * @return name.
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set name.
     *
     * @param name the value to set.
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Get link.
     *
     * @return link.
     */
    public function getLink()
    {
        return $this->link;
    }
    
    /**
     * Set link.
     *
     * @param link the value to set.
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
    
    /**
     * Get type.
     *
     * @return type.
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Set type.
     *
     * @param type the value to set.
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * Get published.
     *
     * @return published.
     */
    public function getPublished()
    {
        return $this->published;
    }
    
    /**
     * Set published.
     *
     * @param published the value to set.
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }
    
    /**
     * Get parent.
     *
     * @return parent.
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * Set parent.
     *
     * @param parent the value to set.
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    
    /**
     * Get componentid.
     *
     * @return componentid.
     */
    public function getComponentid()
    {
        return $this->componentid;
    }
    
    /**
     * Set componentid.
     *
     * @param componentid the value to set.
     */
    public function setComponentid($componentid)
    {
        $this->componentid = $componentid;
    }
    
    /**
     * Get sublevel.
     *
     * @return sublevel.
     */
    public function getSublevel()
    {
        return $this->sublevel;
    }
    
    /**
     * Set sublevel.
     *
     * @param sublevel the value to set.
     */
    public function setSublevel($sublevel)
    {
        $this->sublevel = $sublevel;
    }
    
    /**
     * Get ordering.
     *
     * @return ordering.
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
    
    /**
     * Set ordering.
     *
     * @param ordering the value to set.
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
    }
    
    /**
     * Get checkedOut.
     *
     * @return checkedOut.
     */
    public function getCheckedOut()
    {
        return $this->checkedOut;
    }
    
    /**
     * Set checkedOut.
     *
     * @param checkedOut the value to set.
     */
    public function setCheckedOut($checkedOut)
    {
        $this->checkedOut = $checkedOut;
    }
    
    /**
     * Get checkedOutTime.
     *
     * @return checkedOutTime.
     */
    public function getCheckedOutTime()
    {
        return $this->checkedOutTime;
    }
    
    /**
     * Set checkedOutTime.
     *
     * @param checkedOutTime the value to set.
     */
    public function setCheckedOutTime($checkedOutTime)
    {
        $this->checkedOutTime = $checkedOutTime;
    }
    
    /**
     * Get pollid.
     *
     * @return pollid.
     */
    public function getPollid()
    {
        return $this->pollid;
    }
    
    /**
     * Set pollid.
     *
     * @param pollid the value to set.
     */
    public function setPollid($pollid)
    {
        $this->pollid = $pollid;
    }
    
    /**
     * Get browsernav.
     *
     * @return browsernav.
     */
    public function getBrowsernav()
    {
        return $this->browsernav;
    }
    
    /**
     * Set browsernav.
     *
     * @param browsernav the value to set.
     */
    public function setBrowsernav($browsernav)
    {
        $this->browsernav = $browsernav;
    }
    
    /**
     * Get access.
     *
     * @return access.
     */
    public function getAccess()
    {
        return $this->access;
    }
    
    /**
     * Set access.
     *
     * @param access the value to set.
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }
    
    /**
     * Get utaccess.
     *
     * @return utaccess.
     */
    public function getUtaccess()
    {
        return $this->utaccess;
    }
    
    /**
     * Set utaccess.
     *
     * @param utaccess the value to set.
     */
    public function setUtaccess($utaccess)
    {
        $this->utaccess = $utaccess;
    }
    
    /**
     * Get params.
     *
     * @return params.
     */
    public function getParams()
    {
        return $this->params;
    }
    
    /**
     * Set params.
     *
     * @param params the value to set.
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
    
    /**
     * Get lft.
     *
     * @return lft.
     */
    public function getLft()
    {
        return $this->lft;
    }
    
    /**
     * Set lft.
     *
     * @param lft the value to set.
     */
    public function setLft($lft)
    {
        $this->lft = $lft;
    }
    
    /**
     * Get rgt.
     *
     * @return rgt.
     */
    public function getRgt()
    {
        return $this->rgt;
    }
    
    /**
     * Set rgt.
     *
     * @param rgt the value to set.
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
    }
    
    /**
     * Get home.
     *
     * @return home.
     */
    public function getHome()
    {
        return $this->home;
    }
    
    /**
     * Set home.
     *
     * @param home the value to set.
     */
    public function setHome($home)
    {
        $this->home = $home;
    }
}
