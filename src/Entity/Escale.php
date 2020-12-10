<?php

namespace App\Entity;

use App\Repository\EscaleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EscaleRepository::class)
 */
class Escale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", name="dateheurearrivee")
     */
    private $dateHeureArrivee;

    /**
     * @ORM\ManyToOne(targetEntity=Navire::class, inversedBy="lesEscales")
     * @ORM\JoinColumn(nullable=false, name="idnavire")
     */
    private $leNavire;

    /**
     * @ORM\ManyToOne(targetEntity=Port::class, inversedBy="lesEscales")
     * @ORM\JoinColumn(nullable=false, name="idport")
     */
    private $lePort;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureArrivee(): ?\DateTimeInterface
    {
        return $this->dateHeureArrivee;
    }

    public function setDateHeureArrivee(\DateTimeInterface $dateHeureArrivee): self
    {
        $this->dateHeureArrivee = $dateHeureArrivee;

        return $this;
    }

    public function getLeNavire(): ?Navire
    {
        return $this->leNavire;
    }

    public function setLeNavire(?Navire $leNavire): self
    {
        $this->leNavire = $leNavire;

        return $this;
    }

    public function getLePort(): ?Port
    {
        return $this->lePort;
    }

    public function setLePort(?Port $lePort): self
    {
        $this->lePort = $lePort;

        return $this;
    }
}
