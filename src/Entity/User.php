<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 100)]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $motDePasse;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $tel = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: 'string', length: 20)]
    private string $role = 'client'; 

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Abonnement::class, cascade: ['persist', 'remove'])]
    private Collection $abonnements;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Reservation::class, cascade: ['persist', 'remove'])]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Service::class, cascade: ['persist', 'remove'])]
    private Collection $services;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Review::class, cascade: ['persist', 'remove'])]
    private Collection $reviews;

    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        
        return match($this->role) {
            'admin' => ['ROLE_ADMIN'],
            'prestataire' => ['ROLE_PRESTATAIRE'],
            'client', null, '' => ['ROLE_CLIENT'],
            default => ['ROLE_CLIENT']
        };
    }

    public function getPassword(): string
    {
        return $this->motDePasse;
    }

    public function eraseCredentials(): void
    {
        // Pas de données sensibles temporaires à effacer
    }

    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }
    public function getMotDePasse(): string { return $this->motDePasse; }
    public function setMotDePasse(string $motDePasse): self { $this->motDePasse = $motDePasse; return $this; }
    public function getTel(): ?string { return $this->tel; }
    public function setTel(?string $tel): self { $this->tel = $tel; return $this; }
    public function getAdresse(): ?string { return $this->adresse; }
    public function setAdresse(?string $adresse): self { $this->adresse = $adresse; return $this; }
    public function getDateInscription(): ?\DateTimeInterface { return $this->dateInscription; }
    public function setDateInscription(?\DateTimeInterface $dateInscription): self { $this->dateInscription = $dateInscription; return $this; }
    public function getRole(): string { return $this->role; }
    public function setRole(string $role): self { $this->role = $role; return $this; }

    public function getAbonnements(): Collection { return $this->abonnements; }
    public function addAbonnement(Abonnement $abonnement): self {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->setUser($this);
        }
        return $this;
    }
    public function removeAbonnement(Abonnement $abonnement): self {
        if ($this->abonnements->removeElement($abonnement) && $abonnement->getUser() === $this) {
            $abonnement->setUser(null);
        }
        return $this;
    }

    public function getReservations(): Collection { return $this->reservations; }
    public function addReservation(Reservation $reservation): self {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setUser($this);
        }
        return $this;
    }
    public function removeReservation(Reservation $reservation): self {
        if ($this->reservations->removeElement($reservation) && $reservation->getUser() === $this) {
            $reservation->setUser(null);
        }
        return $this;
    }

    public function getServices(): Collection { return $this->services; }
    public function addService(Service $service): self {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setUser($this);
        }
        return $this;
    }
    public function removeService(Service $service): self {
        if ($this->services->removeElement($service) && $service->getUser() === $this) {
            $service->setUser(null);
        }
        return $this;
    }

    public function getReviews(): Collection { return $this->reviews; }
    public function addReview(Review $review): self {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setUser($this);
        }
        return $this;
    }
    public function removeReview(Review $review): self {
        if ($this->reviews->removeElement($review) && $review->getUser() === $this) {
            $review->setUser(null);
        }
        return $this;
    }
}
