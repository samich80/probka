<?php


namespace App\API\Entity\Parse;


use App\API\Repository\Parse\ProductCategoryToStoreForParseRepository;
use App\Core\Entity\ProductCategoryToStoreCommon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCategoryToStoreForParseRepository::class)
 * @ORM\Table(name="product_category_to_store")
 */
class ProductCategoryToStoreForParse extends ProductCategoryToStoreCommon
{

    /**
     * @ORM\Column(type="string")
     */
    private ?string $evatorId;

    /**
     * @return string|null
     */
    public function getEvatorId(): ?string
    {
        return $this->evatorId;
    }

    /**
     * @param string|null $evatorId
     */
    public function setEvatorId(?string $evatorId): void
    {
        $this->evatorId = $evatorId;
    }


}