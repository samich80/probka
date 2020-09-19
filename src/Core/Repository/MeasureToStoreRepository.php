<?php

namespace App\Core\Repository;

use App\Core\Entity\MeasureToStore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MeasureToStore|null find($id, $lockMode = null, $lockVersion = null)
 */
class MeasureToStoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeasureToStore::class);
    }
}