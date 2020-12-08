<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 */
class Navire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *      pattern="/[1-9]{7}/",
     *      message="Le numéro IMO doit comporter 7 chiffres"
     * )
     */
    private $imo;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *      min=3,
     *      max=100
     * )
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string", length=9)
     *  @Assert\Length(
     *      min=9,
     *      max=9
     * )
     */
    private $mmsi;
    
    /**
     * @ORM\Column(type="string", length=10)
     * 
     */
    private $indicatifAppel;
    
    /**
     * @ORM\Column(type="datetime", length=10)
     * 
     */
    private $eta;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    public function getImo(): ?string
    {
        return $this->imo;
    }

    public function setImo(string $imo): self
    {
        $this->imo = $imo;

        return $this;
    }
    
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    
    public function getMmsi(): ?string
    {
        return $this->mmsi;
    }

    public function setMmsi(string $mmsi): self
    {
        $this->mmsi = $mmsi;

        return $this;
    }
    
    public function getIndicatifAppel(): ?string
    {
        return $this->indicatifAppel;
    }

    public function setIndicatifAppel(string $indicatifAppel): self
    {
        $this->indicatifAppel = $indicatifAppel;

        return $this;
    }
    
    public function getEta(): ?\DateTimeInterface
    {
        return $this->eta;
    }

    public function setEta(\DateTimeInterface $eta): self
    {
        $this->eta = $eta;

        return $this;
    }
}
