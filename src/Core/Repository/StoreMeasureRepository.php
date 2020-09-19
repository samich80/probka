<?php

namespace App\Core\Repository;

use App\Core\Entity\StoreMeasure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreMeasure|null find($id, $lockMode = null, $lockVersion = null)
 */
class StoreMeasureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreMeasure::class);
    }
}