<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PlatformRepository")
 */
class Platform
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
     * @ORM\OneToMany(targetEntity="App\Entity\PlatformGame", mappedBy="platform")
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

    public function addGame(PlatformGame $platformGame): self
    {
        if (!$this->platformGames->contains($platformGame)) {
            $this->platformGames[] = $platformGame;
            $platformGame->setPlatform($this);
        }

        return $this;
    }

    public function removeGame(PlatformGame $platformGame): self
    {
        if ($this->platformGames->contains($platformGame)) {
            $this->platformGames->removeElement($platformGame);
            // set the owning side to null (unless already changed)
            if ($platformGame->getPlatform() === $this) {
                $platformGame->setPlatform(null);
            }
        }

        return $this;
    }
}
