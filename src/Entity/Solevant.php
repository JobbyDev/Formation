<?php

namespace App\Entity;

use App\Repository\SolevantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolevantRepository::class)
 */
class Solevant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $nomination;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $produit;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $rangement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stockMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockReel;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $numeroDeLot;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $peremption;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $defalcation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomination(): ?string
    {
        return $this->nomination;
    }

    public function setNomination(string $nomination): self
    {
        $this->nomination = $nomination;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getRangement(): ?string
    {
        return $this->rangement;
    }

    public function setRangement(string $rangement): self
    {
        $this->rangement = $rangement;

        return $this;
    }

    public function getStockMin(): ?int
    {
        return $this->stockMin;
    }

    public function setStockMin(?int $stockMin): self
    {
        $this->stockMin = $stockMin;

        return $this;
    }

    public function getStockReel(): ?int
    {
        return $this->stockReel;
    }

    public function setStockReel(int $stockReel): self
    {
        $this->stockReel = $stockReel;

        return $this;
    }

    public function getNumeroDeLot(): ?string
    {
        return $this->numeroDeLot;
    }

    public function setNumeroDeLot(string $numeroDeLot): self
    {
        $this->numeroDeLot = $numeroDeLot;

        return $this;
    }

    public function getPeremption(): ?string
    {
        return $this->peremption;
    }

    public function setPeremption(string $peremption): self
    {
        $this->peremption = $peremption;

        return $this;
    }

    public function getDefalcation(): ?string
    {
        return $this->defalcation;
    }

    public function setDefalcation(string $defalcation): self
    {
        $this->defalcation = $defalcation;

        return $this;
    }
}
