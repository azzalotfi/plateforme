<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Payement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idPay = null;

    #[ORM\Column(type: 'float')]
    private float $montant;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $datePayement = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $statut; // ex: "effectué", "en attente", "remboursé"

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $rembourse = false;

    #[ORM\OneToOne(targetEntity: Reservation::class, inversedBy: 'payement')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reservation $reservation = null;

    public function getIdPay(): ?int
    {
        return $this->idPay;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;
        return $this;
    }

    public function getDatePayement(): ?\DateTimeInterface
    {
        return $this->datePayement;
    }

    public function setDatePayement(?\DateTimeInterface $datePayement): self
    {
        $this->datePayement = $datePayement;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function isRembourse(): ?bool
    {
        return $this->rembourse;
    }

    public function setRembourse(?bool $rembourse): self
    {
        $this->rembourse = $rembourse;
        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;
        return $this;
    }
}
