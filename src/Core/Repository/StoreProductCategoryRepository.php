<?php

namespace App\Core\Repository;

use App\Core\Entity\StoreProductCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreProductCategory|null find($id, $lockMode = null, $lockVersion = null)
 */
class StoreProductCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreProductCategory::class);
    }
}