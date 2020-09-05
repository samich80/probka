<?php


namespace App\Core\Entity;

use App\Core\Repository\ProductCategoryToStoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCategoryToStoreRepository::class)
 * @ORM\Table(name="product_category_to_store")
 */
class ProductCategoryToStore
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private int $productCategoryId;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private int $store_id;

    /**
     * @return int
     */
    public function getProductCategoryId(): int
    {
        return $this->productCategoryId;
    }

    /**
     * @param int $productCategoryId
     */
    public function setProductCategoryId(int $productCategoryId): void
    {
        $this->productCategoryId = $productCategoryId;
    }

    /**
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->store_id;
    }

    /**
     * @param int $store_id
     */
    public function setStoreId(int $store_id): void
    {
        $this->store_id = $store_id;
    }
}