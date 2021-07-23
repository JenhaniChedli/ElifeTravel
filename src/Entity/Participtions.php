<?php

namespace App\Entity;

use App\Repository\ParticiptionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticiptionsRepository::class)
 */
class Participtions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $idDestination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdDestination(): ?int
    {
        return $this->idDestination;
    }

    public function setIdDestination(int $idDestination): self
    {
        $this->idDestination = $idDestination;

        return $this;
    }
}
