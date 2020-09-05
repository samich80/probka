<?php

namespace App\Core\Repository;

use App\Core\Entity\StoreInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreInfo|null find($id, $lockMode = null, $lockVersion = null)
 */
class StoreInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreInfo::class);
    }
}