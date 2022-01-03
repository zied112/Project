<?php

namespace App\Entity;

use App\Repository\CentreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentreRepository::class)
 */
class Centre
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
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Don::class, mappedBy="centre")
     */
    private $dons;

    /**
     * @ORM\OneToMany(targetEntity=Operateur::class, mappedBy="centre")
     */
    private $operateurs;

    /**
     * @ORM\OneToMany(targetEntity=Donneur::class, mappedBy="centre")
     */
    private $donneurs;

    public function __construct()
    {
        $this->dons = new ArrayCollection();
        $this->operateurs = new ArrayCollection();
        $this->donneurs = new ArrayCollection();
    }

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Don[]
     */
    public function getDons(): Collection
    {
        return $this->dons;
    }

    public function addDon(Don $don): self
    {
        if (!$this->dons->contains($don)) {
            $this->dons[] = $don;
            $don->setCentre($this);
        }

        return $this;
    }

    public function removeDon(Don $don): self
    {
        if ($this->dons->removeElement($don)) {
            // set the owning side to null (unless already changed)
            if ($don->getCentre() === $this) {
                $don->setCentre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Operateur[]
     */
    public function getOperateurs(): Collection
    {
        return $this->operateurs;
    }

    public function addOperateur(Operateur $operateur): self
    {
        if (!$this->operateurs->contains($operateur)) {
            $this->operateurs[] = $operateur;
            $operateur->setCentre($this);
        }

        return $this;
    }

    public function removeOperateur(Operateur $operateur): self
    {
        if ($this->operateurs->removeElement($operateur)) {
            // set the owning side to null (unless already changed)
            if ($operateur->getCentre() === $this) {
                $operateur->setCentre(null);
            }
        }

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
            $donneur->setCentre($this);
        }

        return $this;
    }

    public function removeDonneur(Donneur $donneur): self
    {
        if ($this->donneurs->removeElement($donneur)) {
            // set the owning side to null (unless already changed)
            if ($donneur->getCentre() === $this) {
                $donneur->setCentre(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->nom;
    }
}
