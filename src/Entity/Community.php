<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CommunityRepository")
 * @ORM\Table(name="communities")
 */
class Community
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game", inversedBy="communities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Game;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommunityTournament", mappedBy="community")
     */
    private $tournaments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommunityUser", mappedBy="community")
     */
    private $communityUsers;

    public function __construct()
    {
        $this->tournaments = new ArrayCollection();
        $this->communityUsers = new ArrayCollection();
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

    public function getGame(): ?Game
    {
        return $this->Game;
    }

    public function setGame(?Game $Game): self
    {
        $this->Game = $Game;

        return $this;
    }

    /**
     * @return Collection|CommunityTournament[]
     */
    public function getTournaments(): Collection
    {
        return $this->tournaments;
    }

    public function addTournament(CommunityTournament $tournament): self
    {
        if (!$this->tournaments->contains($tournament)) {
            $this->tournaments[] = $tournament;
            $tournament->setCommunity($this);
        }

        return $this;
    }

    public function removeTournament(CommunityTournament $tournament): self
    {
        if ($this->tournaments->contains($tournament)) {
            $this->tournaments->removeElement($tournament);
            // set the owning side to null (unless already changed)
            if ($tournament->getCommunity() === $this) {
                $tournament->setCommunity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommunityUser[]
     */
    public function getCommunityUsers(): Collection
    {
        return $this->communityUsers;
    }

    public function addCommunityUser(CommunityUser $communityUser): self
    {
        if (!$this->communityUsers->contains($communityUser)) {
            $this->communityUsers[] = $communityUser;
            $communityUser->setCommunity($this);
        }

        return $this;
    }

    public function removeCommunityUser(CommunityUser $communityUser): self
    {
        if ($this->communityUsers->contains($communityUser)) {
            $this->communityUsers->removeElement($communityUser);
            // set the owning side to null (unless already changed)
            if ($communityUser->getCommunity() === $this) {
                $communityUser->setCommunity(null);
            }
        }

        return $this;
    }
}
