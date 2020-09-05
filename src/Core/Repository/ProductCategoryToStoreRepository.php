<?php

namespace App\Core\Repository;

use App\Core\Entity\ProductCategoryToStore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductCategoryToStore|null find($id, $lockMode = null, $lockVersion = null)
 */
class ProductCategoryToStoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCategoryToStore::class);
    }
}