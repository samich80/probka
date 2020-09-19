<?php


namespace App\Core\Entity;

use App\Core\Repository\StoreMeasureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreMeasureRepository::class)
 * @ORM\Table(name="store_measure")
 */
class StoreMeasure
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
    private int $storeId;

    /**
     * @ORM\Column(type="string")
     */
    private string $defaultTitle;

    /**
     * @ORM\Column(type="string")
     */
    private string $title;

    /**
     * @ORM\Column(type="string")
     */
    private string $defaultInternationalName;

    /**
     * @ORM\Column(type="string")
     */
    private string $internationalName;

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
        return $this->title ?: $this->getDefaultTitle();
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title ?: $this->defaultInternationalName;
    }

    /**
     * @return string
     */
    public function getInternationalName(): string
    {
        return $this->internationalName ?: $this->defaultInternationalName;
    }

    /**
     * @param string $internationalName
     */
    public function setInternationalName(string $internationalName): void
    {
        $this->internationalName = $internationalName;
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
    public function getDefaultTitle(): string
    {
        return $this->defaultTitle;
    }

    /**
     * @param string $defaultTitle
     */
    public function setDefaultTitle(string $defaultTitle): void
    {
        $this->defaultTitle = $defaultTitle;
    }

    /**
     * @return string
     */
    public function getDefaultInternationalName(): string
    {
        return $this->defaultInternationalName;
    }

    /**
     * @param string $defaultInternationalName
     */
    public function setDefaultInternationalName(string $defaultInternationalName): void
    {
        $this->defaultInternationalName = $defaultInternationalName;
    }

}