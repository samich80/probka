<?php


namespace App\Core\Entity;

use App\Core\Repository\StoreProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreProductRepository::class)
 * @ORM\Table(name="store_product")
 */
class StoreProduct
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $alias;

    /**
     * @ORM\Column(type="decimal", scale=5, precision=3)
     */
    private $defaultPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private int $measure_id;

    /**
     * @ORM\Column(type="decimal", scale=5, precision=3)
     */
    private float $amountStep;

    /**
     * @ORM\Column(type="decimal", scale=5, precision=3)
     */
    private float $priceAmountStep;

    /**
     * @ORM\Column(type="integer")
     */
    private int $categoryId;

    /**
     * @ORM\Column(type="decimal", scale=5, precision=3)
     */
    private float $minAmount;

    /**
     * @ORM\Column(type="decimal", scale=5, precision=3, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private int $storeId;

    /**
     * @var Measure
     * @ORM\ManyToOne(targetEntity="Measure")
     */
    private Measure $measure;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @return int
     */
    public function getMeasureId(): int
    {
        return $this->measure_id;
    }

    /**
     * @return float
     */
    public function getAmountStep(): float
    {
        return $this->amountStep;
    }

    /**
     * @return float
     */
    public function getPriceAmountStep(): float
    {
        return $this->priceAmountStep;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return float
     */
    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price ?: $this->defaultPrice;
    }

    /**
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->storeId;
    }

    /**
     * @return string
     */
    public function getMeasure(): string
    {
        return $this->measure ? $this->measure->getTitle() : '';
    }
}