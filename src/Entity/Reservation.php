<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $dateReservation = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $heure = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $montantTotal = null;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Client $client = null;

    #[ORM\ManyToOne(targetEntity: Prestataire::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Prestataire $prestataire = null;

    #[ORM\ManyToOne(targetEntity: Service::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Service $service = null;

    #[ORM\OneToOne(mappedBy: 'reservation', targetEntity: Payement::class, cascade: ['persist', 'remove'])]
    private ?Payement $payement = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Review::class, cascade: ['persist', 'remove'])]
    private Collection $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeImmutable
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeImmutable $dateReservation): self
    {
        $this->dateReservation = $dateReservation;
        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function getMontantTotal(): ?float
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(?float $montantTotal): self
    {
        $this->montantTotal = $montantTotal;
        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->prestataire;
    }

    public function setPrestataire(?Prestataire $prestataire): self
    {
        $this->prestataire = $prestataire;
        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;
        return $this;
    }

    public function getPayement(): ?Payement
    {
        return $this->payement;
    }

    public function setPayement(?Payement $payement): self
    {
        $this->payement = $payement;
        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setReservation($this);
        }
        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            if ($review->getReservation() === $this) {
                $review->setReservation(null);
            }
        }
        return $this;
    }
}
