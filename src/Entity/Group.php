<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 * @ORM\Table(name="groups")
 */
class Group
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
     * @ORM\OneToMany(targetEntity="App\Entity\GroupTournament", mappedBy="agroup")
     */
    private $tournaments;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Game", inversedBy="groups")
     */
    private $games;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GroupUser", mappedBy="agroup")
     */
    private $groupUsers;

    public function __construct()
    {
        $this->tournaments = new ArrayCollection();
        $this->games = new ArrayCollection();
        $this->groupUsers = new ArrayCollection();
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

    /**
     * @return Collection|GroupTournament[]
     */
    public function getTournaments(): Collection
    {
        return $this->tournaments;
    }

    public function addTournament(GroupTournament $tournament): self
    {
        if (!$this->tournaments->contains($tournament)) {
            $this->tournaments[] = $tournament;
            $tournament->setAgroup($this);
        }

        return $this;
    }

    public function removeTournament(GroupTournament $tournament): self
    {
        if ($this->tournaments->contains($tournament)) {
            $this->tournaments->removeElement($tournament);
            // set the owning side to null (unless already changed)
            if ($tournament->getAgroup() === $this) {
                $tournament->setAgroup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->contains($game)) {
            $this->games->removeElement($game);
        }

        return $this;
    }

    /**
     * @return Collection|GroupUser[]
     */
    public function getGroupUsers(): Collection
    {
        return $this->groupUsers;
    }

    public function addGroupUser(GroupUser $groupUser): self
    {
        if (!$this->groupUsers->contains($groupUser)) {
            $this->groupUsers[] = $groupUser;
            $groupUser->setAgroup($this);
        }

        return $this;
    }

    public function removeGroupUser(GroupUser $groupUser): self
    {
        if ($this->groupUsers->contains($groupUser)) {
            $this->groupUsers->removeElement($groupUser);
            // set the owning side to null (unless already changed)
            if ($groupUser->getAgroup() === $this) {
                $groupUser->setAgroup(null);
            }
        }

        return $this;
    }
}
