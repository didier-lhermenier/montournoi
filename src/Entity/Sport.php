<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportRepository")
 */
class Sport
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
     * @ORM\Column(type="smallint")
     */
    private $area_qty;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $letter;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tournament", inversedBy="sports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournament;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contest", mappedBy="sport", orphanRemoval=true)
     */
    private $contests;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $area_name;

    public function __construct()
    {
        $this->contests = new ArrayCollection();
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

    public function getAreaQty(): ?int
    {
        return $this->area_qty;
    }

    public function setAreaQty(int $area_qty): self
    {
        $this->area_qty = $area_qty;

        return $this;
    }

    public function getLetter(): ?string
    {
        return $this->letter;
    }

    public function setLetter(string $letter): self
    {
        $this->letter = $letter;

        return $this;
    }

    public function getTournament(): ?Tournament
    {
        return $this->tournament;
    }

    public function setTournament(?Tournament $tournament): self
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * @return Collection|Contest[]
     */
    public function getContests(): Collection
    {
        return $this->contests;
    }

    public function addContest(Contest $contest): self
    {
        if (!$this->contests->contains($contest)) {
            $this->contests[] = $contest;
            $contest->setPool($this);
        }

        return $this;
    }

    public function removeContest(Contest $contest): self
    {
        if ($this->contests->contains($contest)) {
            $this->contests->removeElement($contest);
            // set the owning side to null (unless already changed)
            if ($contest->getPool() === $this) {
                $contest->setPool(null);
            }
        }

        return $this;
    }

    public function getAreaName(): ?string
    {
        return $this->area_name;
    }

    public function setAreaName(string $area_name): self
    {
        $this->area_name = $area_name;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }


}
