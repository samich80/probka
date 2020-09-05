<?php


namespace App\Core\Entity;

use App\Core\Repository\SlideRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SlideRepository::class)
 * @ORM\Table(name="slide")
 */
class Slide
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $imageId;

    /**
     * @ORM\Column(type="integer")
     */
    private int $storeId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;


    /**
     * @ORM\Column(type="integer")
     */
    private ?int $orderPosition = 0;

    /**
     * @ORM\OneToOne(targetEntity="Image")
     */
    private Image $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->imageId;
    }

    /**
     * @param int $imageId
     */
    public function setImageId(int $imageId): void
    {
        $this->imageId = $imageId;
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
     * @return int
     */
    public function getOrderPosition(): ?int
    {
        return $this->orderPosition;
    }

    /**
     * @param int|null $orderPosition
     */
    public function setOrderPosition(?int $orderPosition): void
    {
        $this->orderPosition = $orderPosition;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

}