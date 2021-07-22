<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Hotel;

    /**
     * @ORM\Column(type="integer")
     */
    private $Duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\Column(type="date")
     */
    private $datedepart;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="destinations")
     */
    private $participtions;

    public function __construct()
    {
        $this->participtions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getHotel(): ?string
    {
        return $this->Hotel;
    }

    public function setHotel(string $Hotel): self
    {
        $this->Hotel = $Hotel;

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
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

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

    /**
     * @return Collection|User[]
     */
    public function getParticiptions(): Collection
    {
        return $this->participtions;
    }

    public function addParticiption(User $particiption): self
    {
        if (!$this->participtions->contains($particiption)) {
            $this->participtions[] = $particiption;
        }

        return $this;
    }

    public function removeParticiption(User $particiption): self
    {
        $this->participtions->removeElement($particiption);

        return $this;
    }
}
