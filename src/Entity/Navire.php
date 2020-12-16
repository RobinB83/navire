<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Range;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 * @ORM\Table( name="navire" ,
 *              uniqueConstraints={@ORM\UniqueConstraint(name="mmsi_unique",columns={"mmsi"})}
 * )
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
      * @ORM\Column(type="string", length=7, unique=true)
      * @Assert\Regex(
     *      pattern="/[1-9][0-9]{6}/",
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
     * @Assert\Regex(
     *      pattern="/[1-9][0-9]{8}/",
     *      message="Le numéro MMSI doit comporter 9 chiffres"
     * )
     */
    private $mmsi;
    
    /**
     * @ORM\Column(type="string", length=10, name="indicatifappel")
     * 
     */
    private $indicatifAppel;
    
    /**
     * @ORM\Column(type="datetime", length=10)
     * 
     */
    private $eta;

    /**
     * @ORM\ManyToOne(targetEntity=AisShipType::class)
     * @ORM\JoinColumn(nullable=false, name="idaisshiptype")
     */
    private $idAisShipType;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class)
     * @ORM\JoinColumn(name="idpays", nullable=false)
     */
    private $lePavillon;

    /**
     * @ORM\OneToMany(targetEntity=Escale::class, mappedBy="leNavire", orphanRemoval=true)
     */
    private $lesEscales;

    /**
     * @ORM\Column(type="integer") 
     * @Assert\Range(
     *      min=0,
     *      notInRangeMessage="La longueur doit être un entier positif"
     * )
     */
    private $Longueur;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min=0,
     *      notInRangeMessage="La largeur doit être un entier positif"
     * )
     */
    private $Largeur;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1, name="tirandeau")
     */
    private $tirandeau;

    /**
     * @ORM\ManyToOne(targetEntity=Port::class, inversedBy="naviresAttendus", cascade={"persist"})
     * @ORM\JoinColumn(name="idportdestination", nullable=true)
     */
    private $portDestination;

    public function __construct()
    {
        $this->lesEscales = new ArrayCollection();
    }

    
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

    public function getIdAisShipType(): ?AisShipType
    {
        return $this->idAisShipType;
    }

    public function setIdAisShipType(?AisShipType $idAisShipType): self
    {
        $this->idAisShipType = $idAisShipType;

        return $this;
    }

    public function getLePavillon(): ?Pays
    {
        return $this->lePavillon;
    }

    public function setLePavillon(?Pays $lePavillon): self
    {
        $this->lePavillon = $lePavillon;

        return $this;
    }

    /**
     * @return Collection|Escale[]
     */
    public function getLesEscales(): Collection
    {
        return $this->lesEscales;
    }

    public function addLesEscale(Escale $lesEscale): self
    {
        if (!$this->lesEscales->contains($lesEscale)) {
            $this->lesEscales[] = $lesEscale;
            $lesEscale->setLeNavire($this);
        }

        return $this;
    }

    public function removeLesEscale(Escale $lesEscale): self
    {
        if ($this->lesEscales->removeElement($lesEscale)) {
            // set the owning side to null (unless already changed)
            if ($lesEscale->getLeNavire() === $this) {
                $lesEscale->setLeNavire(null);
            }
        }

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->Longueur;
    }

    public function setLongueur(int $Longueur): self
    {
        $this->Longueur = $Longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->Largeur;
    }

    public function setLargeur(int $Largeur): self
    {
        $this->Largeur = $Largeur;

        return $this;
    }

    public function getTirantEau(): ?string
    {
        return $this->tirandeau;
    }

    public function setTirantEau(string $tirant_eau): self
    {
        $this->tirandeau = $tirant_eau;

        return $this;
    }

    public function getPortDestination(): ?Port
    {
        return $this->portDestination;
    }

    public function setPortDestination(?Port $portDestination): self
    {
        $this->portDestination = $portDestination;

        return $this;
    }

   
}
