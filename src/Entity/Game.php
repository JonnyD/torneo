<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
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
     * @ORM\OneToMany(targetEntity="App\Entity\PlatformGame", mappedBy="game")
     */
    private $platformGames;

    public function __construct()
    {
        $this->platformGames = new ArrayCollection();
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
     * @return Collection|PlatformGame[]
     */
    public function getPlatformGames(): Collection
    {
        return $this->platformGames;
    }

    public function addPlatformGame(PlatformGame $platformGame): self
    {
        if (!$this->platformGames->contains($platformGame)) {
            $this->platformGames[] = $platformGame;
            $platformGame->setGame($this);
        }

        return $this;
    }

    public function removePlatformGame(PlatformGame $platformGame): self
    {
        if ($this->platformGames->contains($platformGame)) {
            $this->platformGames->removeElement($platformGame);
            // set the owning side to null (unless already changed)
            if ($platformGame->getGame() === $this) {
                $platformGame->setGame(null);
            }
        }

        return $this;
    }
}
