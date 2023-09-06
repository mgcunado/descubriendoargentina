<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="jos_content")
 * @ORM\Entity(repositoryClass="App\Repository\TextoRepository")
 */
class JosContent
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=false)
     */
    private $alias = '';

    /**
     * @var string
     *
     * @ORM\Column(name="title_alias", type="string", length=255, nullable=false)
     */
    private $titleAlias = '';

    /**
     * @var string
     *
     * @ORM\Column(name="introtext", type="text", length=16777215, nullable=false)
     */
    private $introtext;

    /**
     * @var string
     *
     * @ORM\Column(name="excursiones", type="text", length=16777215, nullable=false)
     */
    private $excursiones;

    /**
     * @var string
     *
     * @ORM\Column(name="textocompleto", type="text", length=16777215, nullable=false)
     */
    private $textocompleto;

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false)
     */
    private $state = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="sectionid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $sectionid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="mask", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $mask = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="catid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $catid = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $created = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createdBy = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="created_by_alias", type="string", length=255, nullable=false)
     */
    private $createdByAlias = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $modified = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="modified_by", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $modifiedBy = '0';

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
     * @var \DateTime
     *
     * @ORM\Column(name="publish_up", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $publishUp = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_down", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $publishDown = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="images", type="text", length=65535, nullable=false)
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="urls", type="text", length=65535, nullable=false)
     */
    private $urls;

    /**
     * @var string
     *
     * @ORM\Column(name="attribs", type="text", length=65535, nullable=false)
     */
    private $attribs;

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $version = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="parentid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $parentid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer", nullable=false)
     */
    private $ordering = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metakey", type="text", length=65535, nullable=false)
     */
    private $metakey;

    /**
     * @var string
     *
     * @ORM\Column(name="metadesc", type="text", length=65535, nullable=false)
     */
    private $metadesc;

    /**
     * @var int
     *
     * @ORM\Column(name="access", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $access = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hits = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metadata", type="text", length=65535, nullable=false)
     */
    private $metadata;

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
     * Get title.
     *
     * @return title.
     */
    public function getTitle(): String
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param title the value to set.
     * @param string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
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
     * Get titleAlias.
     *
     * @return titleAlias.
     */
    public function getTitleAlias(): String
    {
        return $this->titleAlias;
    }

    /**
     * Set titleAlias.
     *
     * @param titleAlias the value to set.
     * @param string $titleAlias
     */
    public function setTitleAlias($titleAlias): void
    {
        $this->titleAlias = $titleAlias;
    }

    /**
     * Get introtext.
     *
     * @return introtext.
     */
    public function getIntrotext(): String
    {
        return $this->introtext;
    }

    /**
     * Set introtext.
     *
     * @param introtext the value to set.
     * @param string $introtext
     */
    public function setIntrotext($introtext): void
    {
        $this->introtext = $introtext;
    }

    /**
     * Get excursiones.
     *
     * @return excursiones.
     */
    public function getExcursiones(): String
    {
        return $this->excursiones;
    }

    /**
     * Set excursiones.
     *
     * @param excursiones the value to set.
     * @param string $excursiones
     */
    public function setExcursiones($excursiones): void
    {
        $this->excursiones = $excursiones;
    }

    /**
     * Get textocompleto.
     *
     * @return textocompleto.
     */
    public function getTextocompleto(): String
    {
        return $this->textocompleto;
    }

    /**
     * Set textocompleto.
     *
     * @param textocompleto the value to set.
     * @param string $textocompleto
     */
    public function setTextocompleto($textocompleto): void
    {
        $this->textocompleto = $textocompleto;
    }

    /**
     * Get state.
     *
     * @return state.
     */
    public function getState(): String
    {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param state the value to set.
     * @param string $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * Get sectionid.
     *
     * @return sectionid.
     */
    public function getSectionid(): Int
    {
        return $this->sectionid;
    }

    /**
     * Set sectionid.
     *
     * @param sectionid the value to set.
     * @param int $sectionid
     */
    public function setSectionid($sectionid): void
    {
        $this->sectionid = $sectionid;
    }

    /**
     * Get mask.
     *
     * @return mask.
     */
    public function getMask(): String
    {
        return $this->mask;
    }

    /**
     * Set mask.
     *
     * @param mask the value to set.
     * @param string $mask
     */
    public function setMask($mask): void
    {
        $this->mask = $mask;
    }

    /**
     * Get catid.
     *
     * @return catid.
     */
    public function getCatid(): Int
    {
        return $this->catid;
    }

    /**
     * Set catid.
     *
     * @param catid the value to set.
     * @param int $catid
     */
    public function setCatid($catid): void
    {
        $this->catid = $catid;
    }

    /**
     * Get created.
     *
     * @return created.
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * Set created.
     *
     * @param created the value to set.
     * @param \DateTime $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * Get createdBy.
     *
     * @return createdBy.
     */
    public function getCreatedBy(): String
    {
        return $this->createdBy;
    }

    /**
     * Set createdBy.
     *
     * @param createdBy the value to set.
     * @param string $createdBy
     */
    public function setCreatedBy($createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdByAlias.
     *
     * @return createdByAlias.
     */
    public function getCreatedByAlias(): String
    {
        return $this->createdByAlias;
    }

    /**
     * Set createdByAlias.
     *
     * @param createdByAlias the value to set.
     * @param string $createdByAlias
     */
    public function setCreatedByAlias($createdByAlias): void
    {
        $this->createdByAlias = $createdByAlias;
    }

    /**
     * Get modified.
     *
     * @return modified.
     */
    public function getModified(): \DateTime
    {
        return $this->modified;
    }

    /**
     * Set modified.
     *
     * @param modified the value to set.
     * @param \DateTime $modified
     */
    public function setModified($modified): void
    {
        $this->modified = $modified;
    }

    /**
     * Get modifiedBy.
     *
     * @return modifiedBy.
     */
    public function getModifiedBy(): Int
    {
        return $this->modifiedBy;
    }

    /**
     * Set modifiedBy.
     *
     * @param modifiedBy the value to set.
     * @param int $modifiedBy
     */
    public function setModifiedBy($modifiedBy): void
    {
        $this->modifiedBy = $modifiedBy;
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
     * Get publishUp.
     *
     * @return publishUp.
     */
    public function getPublishUp(): \DateTime
    {
        return $this->publishUp;
    }

    /**
     * Set publishUp.
     *
     * @param publishUp the value to set.
     * @param \DateTime $publishUp
     */
    public function setPublishUp($publishUp): void
    {
        $this->publishUp = $publishUp;
    }

    /**
     * Get publishDown.
     *
     * @return publishDown.
     */
    public function getPublishDown(): \DateTime
    {
        return $this->publishDown;
    }

    /**
     * Set publishDown.
     *
     * @param publishDown the value to set.
     * @param \DateTime $publishDown
     */
    public function setPublishDown($publishDown): void
    {
        $this->publishDown = $publishDown;
    }

    /**
     * Get images.
     *
     * @return images.
     */
    public function getImages(): String
    {
        return $this->images;
    }

    /**
     * Set images.
     *
     * @param images the value to set.
     * @param string $images
     */
    public function setImages($images): void
    {
        $this->images = $images;
    }

    /**
     * Get urls.
     *
     * @return urls.
     */
    public function getUrls(): String
    {
        return $this->urls;
    }

    /**
     * Set urls.
     *
     * @param urls the value to set.
     * @param string $urls
     */
    public function setUrls($urls): void
    {
        $this->urls = $urls;
    }

    /**
     * Get attribs.
     *
     * @return attribs.
     */
    public function getAttribs(): String
    {
        return $this->attribs;
    }

    /**
     * Set attribs.
     *
     * @param attribs the value to set.
     * @param string $attribs
     */
    public function setAttribs($attribs): void
    {
        $this->attribs = $attribs;
    }

    /**
     * Get version.
     *
     * @return version.
     */
    public function getVersion(): Int
    {
        return $this->version;
    }

    /**
     * Set version.
     *
     * @param version the value to set.
     * @param int $version
     */
    public function setVersion($version): void
    {
        $this->version = $version;
    }

    /**
     * Get parentid.
     *
     * @return parentid.
     */
    public function getParentid(): Int
    {
        return $this->parentid;
    }

    /**
     * Set parentid.
     *
     * @param parentid the value to set.
     * @param int $parentid
     */
    public function setParentid($parentid): void
    {
        $this->parentid = $parentid;
    }

    /**
     * Get ordering.
     *
     * @return ordering.
     */
    public function getOrdering(): Int
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
     * Get metakey.
     *
     * @return metakey.
     */
    public function getMetakey(): String
    {
        return $this->metakey;
    }

    /**
     * Set metakey.
     *
     * @param metakey the value to set.
     * @param string $metakey
     */
    public function setMetakey($metakey): void
    {
        $this->metakey = $metakey;
    }

    /**
     * Get metadesc.
     *
     * @return metadesc.
     */
    public function getMetadesc(): String
    {
        return $this->metadesc;
    }

    /**
     * Set metadesc.
     *
     * @param metadesc the value to set.
     * @param string $metadesc
     */
    public function setMetadesc($metadesc): void
    {
        $this->metadesc = $metadesc;
    }

    /**
     * Get access.
     *
     * @return access.
     */
    public function getAccess(): Int
    {
        return $this->access;
    }

    /**
     * Set access.
     *
     * @param access the value to set.
     * @param int $access
     */
    public function setAccess($access): void
    {
        $this->access = $access;
    }

    /**
     * Get hits.
     *
     * @return hits.
     */
    public function getHits(): Int
    {
        return $this->hits;
    }

    /**
     * Set hits.
     *
     * @param hits the value to set.
     * @param int $hits
     */
    public function setHits($hits): void
    {
        $this->hits = $hits;
    }

    /**
     * Get metadata.
     *
     * @return metadata.
     */
    public function getMetadata(): String
    {
        return $this->metadata;
    }

    /**
     * Set metadata.
     *
     * @param metadata the value to set.
     * @param string $metadata
     */
    public function setMetadata($metadata): void
    {
        $this->metadata = $metadata;
    }
}
