<?php

namespace App\Repository;

use App\Entity\JosMenu;
use App\Entity\DescripcionImages;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class JosMenuRepository extends ServiceEntityRepository
{
   public function __construct(RegistryInterface $registry)
   {
      parent::__construct($registry, JosMenu::class);
      parent::__construct($registry, DescripcionImages::class);
   }


   public function findImagen($ide)
   {
      $em = $this->getEntityManager();

      $consulta = $em->createQuery('
            SELECT s.alias AS alias, d.descripcion AS descripcion, d.nombre AS nombre
              FROM App:JosMenu s, App:DescripcionImages d
              WHERE s.alias = :alias and d.nombre =:nombre
          ORDER BY s.id');
$consulta->setParameter('alias', $ide);
$consulta->setParameter('nombre', $ide.'1.jpg');

        return $consulta->getResult();
    }

}

