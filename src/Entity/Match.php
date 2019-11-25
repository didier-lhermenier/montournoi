<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamer", inversedBy="matches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gamer1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamer", inversedBy="matches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gamer2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGamer1(): ?Gamer
    {
        return $this->gamer1;
    }

    public function setGamer1(?Gamer $gamer1): self
    {
        $this->gamer1 = $gamer1;

        return $this;
    }

    public function getGamer2(): ?Gamer
    {
        return $this->gamer2;
    }

    public function setGamer2(?Gamer $gamer2): self
    {
        $this->gamer2 = $gamer2;

        return $this;
    }
}
