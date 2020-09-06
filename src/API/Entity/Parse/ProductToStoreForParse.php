<?php


namespace App\API\Entity\Parse;

use App\API\Repository\Parse\ProductToStoreForParseRepository;
use App\Core\Entity\ProductToStoreCommon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductToStoreForParseRepository::class)
 * @ORM\Table(name="product_to_store")
 */
class ProductToStoreForParse extends ProductToStoreCommon
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