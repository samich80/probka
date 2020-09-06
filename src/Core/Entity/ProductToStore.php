<?php


namespace App\Core\Entity;

use App\Core\Repository\ProductToStoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductToStoreRepository::class)
 * @ORM\Table(name="product_to_store")
 */
class ProductToStore extends ProductToStoreCommon
{
}