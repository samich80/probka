<?php


namespace App\Core\Entity;

use App\Core\Repository\MeasureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MeasureRepository::class)
 * @ORM\Table(name="measure")
 */
class Measure
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
     * @return string
     */
    public function getInternationalName(): string
    {
        return $this->internationalName;
    }

    /**
     * @param string $internationalName
     */
    public function setInternationalName(string $internationalName): void
    {
        $this->internationalName = $internationalName;
    }

}