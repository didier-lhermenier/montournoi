<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TournamentRepository")
 */
class Tournament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_private;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_begin;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_end;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="smallint")
     */
    private $max_gamers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_free;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Gamer", inversedBy="tournaments")
     */
    private $gamers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sport", mappedBy="tournament", orphanRemoval=true)
     */
    private $sports;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pool", mappedBy="tournament", orphanRemoval=true)
     */
    private $pools;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manager", inversedBy="tournaments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $manager;

    public function __construct()
    {
        $this->gamers = new ArrayCollection();
        $this->sports = new ArrayCollection();
        $this->pools = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsPrivate(): ?bool
    {
        return $this->is_private;
    }

    public function setIsPrivate(bool $is_private): self
    {
        $this->is_private = $is_private;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDateBegin(): ?\DateTimeInterface
    {
        return $this->date_begin;
    }

    public function setDateBegin(\DateTimeInterface $date_begin): self
    {
        $this->date_begin = $date_begin;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getMaxGamers(): ?int
    {
        return $this->max_gamers;
    }

    public function setMaxGamers(int $max_gamers): self
    {
        $this->max_gamers = $max_gamers;

        return $this;
    }

    public function getIsFree(): ?bool
    {
        return $this->is_free;
    }

    public function setIsFree(bool $is_free): self
    {
        $this->is_free = $is_free;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Gamer[]
     */
    public function getGamers(): Collection
    {
        return $this->gamers;
    }

    public function addGamer(Gamer $gamer): self
    {
        if (!$this->gamers->contains($gamer)) {
            $this->gamers[] = $gamer;
        }

        return $this;
    }

    public function removeGamer(Gamer $gamer): self
    {
        if ($this->gamers->contains($gamer)) {
            $this->gamers->removeElement($gamer);
        }

        return $this;
    }

    /**
     * @return Collection|Sport[]
     */
    public function getSports(): Collection
    {
        return $this->sports;
    }

    public function addSport(Sport $sport): self
    {
        if (!$this->sports->contains($sport)) {
            $this->sports[] = $sport;
            $sport->setTournament($this);
        }

        return $this;
    }

    public function removeSport(Sport $sport): self
    {
        if ($this->sports->contains($sport)) {
            $this->sports->removeElement($sport);
            // set the owning side to null (unless already changed)
            if ($sport->getTournament() === $this) {
                $sport->setTournament(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pool[]
     */
    public function getPools(): Collection
    {
        return $this->pools;
    }

    public function addPool(Pool $pool): self
    {
        if (!$this->pools->contains($pool)) {
            $this->pools[] = $pool;
            $pool->setTournament($this);
        }

        return $this;
    }

    public function removePool(Pool $pool): self
    {
        if ($this->pools->contains($pool)) {
            $this->pools->removeElement($pool);
            // set the owning side to null (unless already changed)
            if ($pool->getTournament() === $this) {
                $pool->setTournament(null);
            }
        }

        return $this;
    }

    public function getManager(): ?Manager
    {
        return $this->manager;
    }

    public function setManager(?Manager $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
