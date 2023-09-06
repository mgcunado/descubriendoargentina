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
     * Get menutype.
     *
     * @return menutype.
     */
    public function getMenutype(): String
    {
        return $this->menutype;
    }
    
    /**
     * Set menutype.
     *
     * @param menutype the value to set.
     * @param string $menutype
     */
    public function setMenutype($menutype): void
    {
        $this->menutype = $menutype;
    }
    
    /**
     * Get name.
     *
     * @return name.
     */
    public function getName(): String
    {
        return $this->name;
    }
    
    /**
     * Set name.
     *
     * @param name the value to set.
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
    
    /**
     * Get alias.
     *
     * @return alias.
     */
    public function getAlias(): String
    {
        return $this->alias;
    }
    
    /**
     * Set alias.
     *
     * @param alias the value to set.
     * @param string $alias
     */
    public function setAlias($alias): void
    {
        $this->alias = $alias;
    }
    
    /**
     * Get link.
     *
     * @return link.
     */
    public function getLink(): String
    {
        return $this->link;
    }
    
    /**
     * Set link.
     *
     * @param link the value to set.
     * @param string $link
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }
    
    /**
     * Get type.
     *
     * @return type.
     */
    public function getType(): String
    {
        return $this->type;
    }
    
    /**
     * Set type.
     *
     * @param type the value to set.
     * @param string $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }
    
    /**
     * Get published.
     *
     * @return published.
     */
    public function getPublished(): Bool
    {
        return $this->published;
    }
    
    /**
     * Set published.
     *
     * @param published the value to set.
     * @param bool $published
     */
    public function setPublished($published): void
    {
        $this->published = $published;
    }
    
    /**
     * Get parent.
     *
     * @return parent.
     */
    public function getParent(): Int
    {
        return $this->parent;
    }
    
    /**
     * Set parent.
     *
     * @param parent the value to set.
     * @param int $parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }
    
    /**
     * Get componentid.
     *
     * @return componentid.
     */
    public function getComponentid(): Int
    {
        return $this->componentid;
    }
    
    /**
     * Set componentid.
     *
     * @param componentid the value to set.
     * @param int $componentid
     */
    public function setComponentid($componentid): void
    {
        $this->componentid = $componentid;
    }
    
    /**
     * Get sublevel.
     *
     * @return sublevel.
     */
    public function getSublevel(): ?Int
    {
        return $this->sublevel;
    }
    
    /**
     * Set sublevel.
     *
     * @param sublevel the value to set.
     * @param int $sublevel
     */
    public function setSublevel($sublevel): void
    {
        $this->sublevel = $sublevel;
    }
    
    /**
     * Get ordering.
     *
     * @return ordering.
     */
    public function getOrdering(): ?Int
    {
        return $this->ordering;
    }
    
    /**
     * Set ordering.
     *
     * @param ordering the value to set.
     * @param int $ordering
     */
    public function setOrdering($ordering): void
    {
        $this->ordering = $ordering;
    }
    
    /**
     * Get checkedOut.
     *
     * @return checkedOut.
     */
    public function getCheckedOut(): Int
    {
        return $this->checkedOut;
    }
    
    /**
     * Set checkedOut.
     *
     * @param checkedOut the value to set.
     * @param int $checkedOut
     */
    public function setCheckedOut($checkedOut): void
    {
        $this->checkedOut = $checkedOut;
    }
    
    /**
     * Get checkedOutTime.
     *
     * @return checkedOutTime.
     */
    public function getCheckedOutTime(): \DateTime
    {
        return $this->checkedOutTime;
    }
    
    /**
     * Set checkedOutTime.
     *
     * @param checkedOutTime the value to set.
     * @param \DateTime $checkedOutTime
     */
    public function setCheckedOutTime($checkedOutTime): void
    {
        $this->checkedOutTime = $checkedOutTime;
    }
    
    /**
     * Get pollid.
     *
     * @return pollid.
     */
    public function getPollid(): Int
    {
        return $this->pollid;
    }
    
    /**
     * Set pollid.
     *
     * @param pollid the value to set.
     * @param int $pollid
     */
    public function setPollid($pollid): void
    {
        $this->pollid = $pollid;
    }
    
    /**
     * Get browsernav.
     *
     * @return browsernav.
     */
    public function getBrowsernav(): ?Bool
    {
        return $this->browsernav;
    }
    
    /**
     * Set browsernav.
     *
     * @param browsernav the value to set.
     * @param bool $browsernav
     */
    public function setBrowsernav($browsernav): void
    {
        $this->browsernav = $browsernav;
    }
    
    /**
     * Get access.
     *
     * @return access.
     */
    public function getAccess(): Bool
    {
        return $this->access;
    }
    
    /**
     * Set access.
     *
     * @param access the value to set.
     * @param bool $access
     */
    public function setAccess($access): void
    {
        $this->access = $access;
    }
    
    /**
     * Get utaccess.
     *
     * @return utaccess.
     */
    public function getUtaccess(): Bool
    {
        return $this->utaccess;
    }
    
    /**
     * Set utaccess.
     *
     * @param utaccess the value to set.
     * @param bool $utaccess
     */
    public function setUtaccess($utaccess): void
    {
        $this->utaccess = $utaccess;
    }
    
    /**
     * Get params.
     *
     * @return params.
     */
    public function getParams(): String
    {
        return $this->params;
    }
    
    /**
     * Set params.
     *
     * @param params the value to set.
     * @param string $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }
    
    /**
     * Get lft.
     *
     * @return lft.
     */
    public function getLft(): Int
    {
        return $this->lft;
    }
    
    /**
     * Set lft.
     *
     * @param lft the value to set.
     * @param int $lft
     */
    public function setLft($lft): void
    {
        $this->lft = $lft;
    }
    
    /**
     * Get rgt.
     *
     * @return rgt.
     */
    public function getRgt(): Int
    {
        return $this->rgt;
    }
    
    /**
     * Set rgt.
     *
     * @param rgt the value to set.
     * @param int $rgt
     */
    public function setRgt($rgt): void
    {
        $this->rgt = $rgt;
    }
    
    /**
     * Get home.
     *
     * @return home.
     */
    public function getHome(): Int
    {
        return $this->home;
    }
    
    /**
     * Set home.
     *
     * @param home the value to set.
     * @param int $home
     */
    public function setHome($home): void
    {
        $this->home = $home;
    }
}
