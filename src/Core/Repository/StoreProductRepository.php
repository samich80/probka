<?php

namespace App\Core\Repository;

use App\Core\Entity\StoreProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreProduct|null find($id, $lockMode = null, $lockVersion = null)
 */
class StoreProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreProduct::class);
    }
}