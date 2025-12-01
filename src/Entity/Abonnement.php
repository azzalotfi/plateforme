<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idAbo = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $type;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: 'float')]
    private float $prix;

    #[ORM\Column(type: 'string', length: 50)]
    private string $status; // pending, completed, canceled

    // Client qui réserve le service
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $client = null;

    // Prestataire qui fournit le service
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $prestataire = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isPaidToPrestataire = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $transactionId = null; // Stripe ou autre référence paiement

    // ---------- Getters & Setters ----------

    public function getIdAbo(): ?int
    {
        return $this->idAbo;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getPrestataire(): ?User
    {
        return $this->prestataire;
    }

    public function setPrestataire(?User $prestataire): self
    {
        $this->prestataire = $prestataire;
        return $this;
    }

    public function getIsPaidToPrestataire(): bool
    {
        return $this->isPaidToPrestataire;
    }

    public function setIsPaidToPrestataire(bool $isPaidToPrestataire): self
    {
        $this->isPaidToPrestataire = $isPaidToPrestataire;
        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;
        return $this;
    }
}
