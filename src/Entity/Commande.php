<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column(length: 255)]
    private ?string $societe = null;

    #[ORM\Column(length: 255)]
    private ?string $produitAchete = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?float $montantTotal = null;

    #[ORM\Column(length: 255)]
    private ?string $methPay = null;

    #[ORM\Column(length: 255)]
    private ?string $modeLiv = null;

    #[ORM\OneToOne(inversedBy: 'commande', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Panier $idp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): static
    {
        $this->societe = $societe;

        return $this;
    }

    public function getProduitAchete(): ?string
    {
        return $this->produitAchete;
    }

    public function setProduitAchete(string $produitAchete): static
    {
        $this->produitAchete = $produitAchete;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getMontantTotal(): ?float
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(float $montantTotal): static
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    public function getMethPay(): ?string
    {
        return $this->methPay;
    }

    public function setMethPay(string $methPay): static
    {
        $this->methPay = $methPay;

        return $this;
    }

    public function getModeLiv(): ?string
    {
        return $this->modeLiv;
    }

    public function setModeLiv(string $modeLiv): static
    {
        $this->modeLiv = $modeLiv;

        return $this;
    }

    public function getIdp(): ?Panier
    {
        return $this->idp;
    }

    public function setIdp(Panier $idp): static
    {
        $this->idp = $idp;

        return $this;
    }
}
