<?php


namespace App\Core\Entity;

use App\Core\Repository\ProductToStoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductToStoreRepository::class)
 * @ORM\Table(name="product_to_store")
 */
class ProductToStore
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private int $productId;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private int $store_id;

    /**
     * @ORM\Column(type="decimal", scale=5, precision=3)
     */
    private float $price;

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
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

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

}