<?php

namespace App\API\Repository\Parse;

use App\API\Entity\Parse\ProductToStoreForParse;
use App\Core\Entity\ProductToStore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductToStore|null find($id, $lockMode = null, $lockVersion = null)
 */
class ProductToStoreForParseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductToStoreForParse::class);
    }
}