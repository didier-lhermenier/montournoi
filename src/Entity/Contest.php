<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContestRepository")
 */
class Contest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamer", inversedBy="contests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gamer1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamer", inversedBy="contests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gamer2;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $score1;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $score2;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $round;

    /**
     * @ORM\Column(type="boolean")
     */
    private $in_progress;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sport", inversedBy="contests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sport;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pool", inversedBy="contests")
     */
    private $pool;

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

    public function getScore1(): ?int
    {
        return $this->score1;
    }

    public function setScore1(?int $score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?int
    {
        return $this->score2;
    }

    public function setScore2(?int $score2): self
    {
        $this->score2 = $score2;

        return $this;
    }

    public function getRound(): ?int
    {
        return $this->round;
    }

    public function setRound(?int $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getInProgress(): ?bool
    {
        return $this->in_progress;
    }

    public function setInProgress(bool $in_progress): self
    {
        $this->in_progress = $in_progress;

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getPool(): ?Pool
    {
        return $this->pool;
    }

    public function setPool(?Pool $pool): self
    {
        $this->pool = $pool;

        return $this;
    }
}
