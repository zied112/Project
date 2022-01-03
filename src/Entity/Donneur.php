<?php

namespace App\Entity;

use App\Entity\Don;
use App\Entity\Centre;
use App\Entity\Operateur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DonneurRepository;

/**
 * @ORM\Entity(repositoryClass=DonneurRepository::class)
 */
class Donneur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $CIN;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity=Operateur::class, inversedBy="donneurs")
     */
    private $operateur;

    
     /**
     * @ORM\ManyToOne(targetEntity=Don::class, inversedBy="donneurs")
     */
    private $don;

    /**
     * @ORM\ManyToOne(targetEntity=Centre::class, inversedBy="donneurs")
     */
    private $centre;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCIN(): ?int
    {
        return $this->CIN;
    }

    public function setCIN(int $CIN): self
    {
        $this->CIN = $CIN;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getOperateur(): ?Operateur
    {
        return $this->operateur;
    }
    public function setOperateur(?Operateur $operateur): self
    {
        $this->operateur = $operateur;

        return $this;
    }

    /*public function setOperateur(?Operateur $operateur): self
    {
        // unset the owning side of the relation if necessary
        if ($operateur === null && $this->operateur !== null) {
            $this->operateur->setDonneur(null);
        }

        // set the owning side of the relation if necessary
        if ($operateur !== null && $operateur->getDonneur() !== $this) {
            $operateur->setDonneur($this);
        }

        $this->operateur = $operateur;

        return $this;
    }*/

    public function getDon(): ?Don
    {
        return $this->don;
    }

    public function setDon(?Don $don): self
    {
        $this->don = $don;

        return $this;
    }

    public function __toString(){
        return $this->nom;
    }

    public function getCentre(): ?Centre
    {
        return $this->centre;
    }

    public function setCentre(?Centre $centre): self
    {
        $this->centre = $centre;

        return $this;
    }
}
