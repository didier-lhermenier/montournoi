<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GamerRepository")
 */
class Gamer
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
     * @ORM\Column(type="string", length=50)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manager", inversedBy="gamers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $manager;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tournament", mappedBy="gamers")
     */
    private $tournaments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contest", mappedBy="gamer1")
     */
    private $contests1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contest", mappedBy="gamer2")
     */
    private $contests2;

    public function __construct()
    {
        $this->tournaments = new ArrayCollection();
        $this->contests1   = new ArrayCollection();
        $this->contests2   = new ArrayCollection();
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

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

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

    /**
     * @return Collection|Tournament[]
     */
    public function getTournaments(): Collection
    {
        return $this->tournaments;
    }

    public function addTournament(Tournament $tournament): self
    {
        if (!$this->tournaments->contains($tournament)) {
            $this->tournaments[] = $tournament;
            $tournament->addGamer($this);
        }

        return $this;
    }

    public function removeTournament(Tournament $tournament): self
    {
        if ($this->tournaments->contains($tournament)) {
            $this->tournaments->removeElement($tournament);
            $tournament->removeGamer($this);
        }

        return $this;
    }

    /**
     * @return Collection|Contest1[]
     */
    public function getContests1(): Collection
    {
        return $this->contests1;
    }

    public function addContest(Contest $contest1): self
    {
        if (!$this->contests1->contains($contest1)) {
            $this->contests1[] = $contest1;
            $contest1->setGamer1($this);
        }

        return $this;
    }

    public function removeContest1(Contest $contest1): self
    {
        if ($this->contests1->contains($contest1)) {
            $this->contests1->removeElement($contest1);
            // set the owning side to null (unless already changed)
            if ($contest1->getGamer1() === $this) {
                $contest1->setGamer1(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Contest2[]
     */
    public function getContests2(): Collection
    {
        return $this->contests2;
    }

    public function addContest2(Contest $contest2): self
    {
        if (!$this->contests2->contains($contest2)) {
            $this->contests2[] = $contest2;
            $contest2->setGamer2($this);
        }

        return $this;
    }

    public function removeContest2(Contest $contest2): self
    {
        if ($this->contests2->contains($contest2)) {
            $this->contests2->removeElement($contest2);
            // set the owning side to null (unless already changed)
            if ($contest2->getGamer2() === $this) {
                $contest2->setGamer2(null);
            }
        }

        return $this;
    }
}
