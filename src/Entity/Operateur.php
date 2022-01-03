<?php

namespace App\Entity;

use App\Entity\Centre;
use App\Entity\Donneur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OperateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=OperateurRepository::class)
 */
class Operateur
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
     * @ORM\OneToMany(targetEntity=Donneur::class, mappedBy="operateur")
     */
    private $donneurs;

    /**
     * @ORM\ManyToOne(targetEntity=Centre::class, inversedBy="operateurs")
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

    /**
     * @return Collection|Donneur[]
     */
    public function getDonneurs(): Collection
    {
        return $this->donneurs;
    }

    public function addDonneur(Donneur $donneur): self
    {
        if (!$this->donneurs->contains($donneur)) {
            $this->donneurs[] = $donneur;
            $donneur->setOperateur($this);
        }

        return $this;
    }

    public function removeDonneur(Donneur $donneur): self
    {
        if ($this->donneurs->removeElement($donneur)) {
            // set the owning side to null (unless already changed)
            if ($donneur->getOperateur() === $this) {
                $donneur->setOperateur(null);
            }
        }

        return $this;
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

    public function __toString(){
        return $this->nom;
    }
}
