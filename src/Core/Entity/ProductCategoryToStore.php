<?php


namespace App\Core\Entity;

use App\Core\Repository\ProductCategoryToStoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCategoryToStoreRepository::class)
 * @ORM\Table(name="product_category_to_store")
 */
class ProductCategoryToStore extends ProductCategoryToStoreCommon
{
}