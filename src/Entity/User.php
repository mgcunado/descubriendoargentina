<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  public function __construct()
  {
    parent::__construct();
    // your own logic
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
}
