<?php


namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 */
class ProductCategoryToStoreCommon
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    protected int $productCategoryId;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    protected int $storeId;

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
        return $this->storeId;
    }

    /**
     * @param int $storeId
     */
    public function setStoreId(int $storeId): void
    {
        $this->storeId = $storeId;
    }
}