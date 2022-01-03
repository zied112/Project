<?php

namespace App\Entity;

use App\Entity\Centre;
use App\Entity\Donneur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=DonRepository::class)
 */
class Don
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
    private $groupe;

    /**
     * @ORM\OneToMany(targetEntity=Donneur::class, mappedBy="don")
     */
    private $donneurs;

    /**
     * @ORM\ManyToOne(targetEntity=Centre::class, inversedBy="dons")
     */
    private $centre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

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
            $donneur->setDon($this);
        }

        return $this;
    }

    public function removeDonneur(Donneur $donneur): self
    {
        if ($this->donneurs->removeElement($donneur)) {
            // set the owning side to null (unless already changed)
            if ($donneur->getDon() === $this) {
                $donneur->setDon(null);
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
        return $this->groupe;
    }
}
