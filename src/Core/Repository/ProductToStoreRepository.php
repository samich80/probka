<?php

namespace App\Core\Repository;

use App\Core\Entity\ProductToStore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductToStore|null find($id, $lockMode = null, $lockVersion = null)
 */
class ProductToStoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductToStore::class);
    }
}