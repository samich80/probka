<?php


namespace App\Core\Entity;

use App\Core\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table(name="product")
 */
class Product
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
    private ?string $alias;

    /**
     * @ORM\Column(type="decimal", scale=2, precision=8)
     */
    private float $defaultPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private int $measure_id;

    /**
     * @ORM\Column(type="decimal", scale=3, precision=8)
     */
    private float $amountStep = 1;

    /**
     * @ORM\Column(type="decimal", scale=3, precision=8)
     */
    private float $priceAmountStep = 1;

    /**
     * @ORM\Column(type="integer")
     */
    private int $categoryId;

    /**
     * @ORM\Column(type="decimal", scale=3, precision=8)
     */
    private float $minAmount = 1;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string|null $alias
     */
    public function setAlias(?string $alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @return float
     */
    public function getDefaultPrice(): float
    {
        return $this->defaultPrice;
    }

    /**
     * @param float $defaultPrice
     */
    public function setDefaultPrice(float $defaultPrice): void
    {
        $this->defaultPrice = $defaultPrice;
    }

    /**
     * @return int
     */
    public function getMeasureId(): int
    {
        return $this->measure_id;
    }

    /**
     * @param int $measure_id
     */
    public function setMeasureId(int $measure_id): void
    {
        $this->measure_id = $measure_id;
    }

    /**
     * @return float
     */
    public function getAmountStep(): float
    {
        return $this->amountStep;
    }

    /**
     * @param float $amountStep
     */
    public function setAmountStep(float $amountStep): void
    {
        $this->amountStep = $amountStep;
    }

    /**
     * @return float
     */
    public function getPriceAmountStep(): float
    {
        return $this->priceAmountStep;
    }

    /**
     * @param float $priceAmountStep
     */
    public function setPriceAmountStep(float $priceAmountStep): void
    {
        $this->priceAmountStep = $priceAmountStep;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return float
     */
    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    /**
     * @param float $minAmount
     */
    public function setMinAmount(float $minAmount): void
    {
        $this->minAmount = $minAmount;
    }
}