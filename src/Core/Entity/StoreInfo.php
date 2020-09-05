<?php


namespace App\Core\Entity;

use App\Core\Repository\StoreInfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreInfoRepository::class)
 * @ORM\Table(name="store_info")
 */
class StoreInfo
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $storeId;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private string $phoneForCall;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private string $phoneForWhatsapp;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $email;

    /**
     * @ORM\Column(type="string")
     */
    private string $mapLink;

    /**
     * @ORM\Column(type="string")
     */
    private string $workTime;

    /**
     * @ORM\Column(type="string")
     */
    private string $workBreak;

    /**
     * @ORM\Column(type="string")
     */
    private string $workDaysOff;


    /**
     * @return string
     */
    public function getPhoneForCall(): string
    {
        return $this->phoneForCall;
    }

    /**
     * @param string $phoneForCall
     */
    public function setPhoneForCall(string $phoneForCall): void
    {
        $this->phoneForCall = $phoneForCall;
    }

    /**
     * @return string
     */
    public function getPhoneForWhatsapp(): string
    {
        return $this->phoneForWhatsapp;
    }

    /**
     * @param string $phoneForWhatsapp
     */
    public function setPhoneForWhatsApp(string $phoneForWhatsapp): void
    {
        $this->phoneForWhatsapp = $phoneForWhatsapp;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMapLink(): string
    {
        return $this->mapLink;
    }

    /**
     * @param string $mapLink
     */
    public function setMapLink(string $mapLink): void
    {
        $this->mapLink = $mapLink;
    }

    /**
     * @return string
     */
    public function getWorkTime(): string
    {
        return $this->workTime;
    }

    /**
     * @param string $workTime
     */
    public function setWorkTime(string $workTime): void
    {
        $this->workTime = $workTime;
    }

    /**
     * @return string
     */
    public function getWorkBreak(): string
    {
        return $this->workBreak;
    }

    /**
     * @param string $workBreak
     */
    public function setWorkBreak(string $workBreak): void
    {
        $this->workBreak = $workBreak;
    }

    /**
     * @return string
     */
    public function getWorkDaysOff(): string
    {
        return $this->workDaysOff;
    }

    /**
     * @param string $workDaysOff
     */
    public function setWorkDaysOff(string $workDaysOff): void
    {
        $this->workDaysOff = $workDaysOff;
    }


}