<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAchat = null;

    #[ORM\Column(length: 255)]
    private ?string $societe = null;

    #[ORM\Column]
    private ?float $quantite = null;

    #[ORM\Column]
    private ?float $prixUnitaire = null;

    #[ORM\Column]
    private ?float $montantTotal = null;

    #[ORM\OneToOne(mappedBy: 'idp', cascade: ['persist', 'remove'])]
    private ?Commande $commande = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getdateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setdateAchat(\DateTimeInterface $dateAchat): static
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getsociete(): ?string
    {
        return $this->societe;
    }

    public function setsociete(string $societe): static
    {
        $this->societe = $societe;

        return $this;
    }

    public function getquantite(): ?float
    {
        return $this->quantite;
    }

    public function setquantite(float $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getprixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setprixUnitaire(float $prixUnitaire): static
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getmontantTotal(): ?float
    {
        return $this->montantTotal;
    }

    public function setmontantTotal(float $montantTotal): static
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(Commande $commande): static
    {
        // set the owning side of the relation if necessary
        if ($commande->getIdp() !== $this) {
            $commande->setIdp($this);
        }

        $this->commande = $commande;

        return $this;
    }


}
