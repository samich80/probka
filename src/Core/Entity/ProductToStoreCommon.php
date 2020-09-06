<?php


namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class ProductToStoreCommon
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    protected int $productId;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    protected int $storeId;

    /**
     * @ORM\Column(type="decimal", scale=3, precision=8)
     */
    protected float $price;

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
        return $this->storeId;
    }

    /**
     * @param int $storeId
     */
    public function setStoreId(int $storeId): void
    {
        $this->storeId = $storeId;
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