<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:5 , max:50)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:5 , max:50)]
    private $nom;

    #[ORM\Column(type: 'string', length:50)]
    #[Assert\NotNull()]
    #[Assert\Regex(pattern:"/^[0-9]+$/")]
    private $telephone;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\Email()]
    #[Assert\NotNull()]
    private $email;

    #[ORM\Column(type: 'string', length: 200 )]
    #[Assert\NotNull()]
    #[Assert\Length(min:5 , max:200)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotNull()]
    #[Assert\Length(min:5 , max:50)]
    private $poste;

    #[ORM\Column(type: 'float')]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private $salaire;

    #[ORM\Column(type: 'date')]
    #[Assert\NotBlank()]
    #[Assert\Type(type:'datetime')]
    private $date_de_naissance;

    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }
}
