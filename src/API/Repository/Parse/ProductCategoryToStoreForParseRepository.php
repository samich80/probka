<?php

namespace App\API\Repository\Parse;

use App\API\Entity\Parse\ProductCategoryToStoreForParse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductCategoryToStoreForParse|null find($id, $lockMode = null, $lockVersion = null)
 */
class ProductCategoryToStoreForParseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCategoryToStoreForParse::class);
    }
}