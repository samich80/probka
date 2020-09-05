<?php

namespace App\Core\Repository;

use App\Core\Entity\Slide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Slide|null find($id, $lockMode = null, $lockVersion = null)
 */
class SlideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slide::class);
    }
}