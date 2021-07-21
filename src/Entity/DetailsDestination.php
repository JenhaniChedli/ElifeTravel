<?php

namespace App\Entity;

use App\Repository\DetailsDestinationRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=DetailsDestinationRepository::class)
 */
class DetailsDestination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $Hotel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="integer")
     */
    private $Duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="date")
     */
    private $datedepart;

    /**
     * @ORM\OneToOne(targetEntity=Destination::class, cascade={"persist", "remove"})
     */
    private $destination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotel(): ?string
    {
        return $this->Hotel;
    }

    public function setHotel(?string $Hotel): self
    {
        $this->Hotel = $Hotel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(int $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(\DateTimeInterface $datedepart): self
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setDestination(?Destination $destination): self
    {
        $this->destination = $destination;

        return $this;
    }
}
