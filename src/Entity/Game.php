<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use App\Traits\Timestampable;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={"access_control"="is_granted('ROLE_SUPER_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"access_control"="is_granted('ROLE_SUPER_ADMIN')"},
 *         "delete"={"access_control"="is_granted('ROLE_SUPER_ADMIN')"}
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 * @ORM\Table(name="games")
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 * @ORM\HasLifecycleCallbacks
 */
class Game
{
    use BlameableEntity;
    use SoftDeleteableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     max=255
     * )
     * @Gedmo\Versioned
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Platform", inversedBy="games")
     * @ORM\JoinTable(name="games_platforms")
     */
    private $platforms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tournament", mappedBy="game")
     */
    private $tournaments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Community", mappedBy="game")
     */
    private $communities;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Group", mappedBy="games")
     * @ORM\JoinTable(name="groups_games")
     */
    private $groups;

    public function __construct()
    {
        $this->platforms = new ArrayCollection();
        $this->tournaments = new ArrayCollection();
        $this->communities = new ArrayCollection();
        $this->groups = new ArrayCollection();
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
     * @return Collection|Platform[]
     */
    public function getPlatforms(): Collection
    {
        return $this->platforms;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platforms->contains($platform)) {
            $this->platforms[] = $platform;
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        if ($this->platforms->contains($platform)) {
            $this->platforms->removeElement($platform);
        }

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
            $tournament->setGame($this);
        }

        return $this;
    }

    public function removeTournament(Tournament $tournament): self
    {
        if ($this->tournaments->contains($tournament)) {
            $this->tournaments->removeElement($tournament);
            // set the owning side to null (unless already changed)
            if ($tournament->getGame() === $this) {
                $tournament->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Community[]
     */
    public function getCommunities(): Collection
    {
        return $this->communities;
    }

    public function addCommunity(Community $community): self
    {
        if (!$this->communities->contains($community)) {
            $this->communities[] = $community;
            $community->setGame($this);
        }

        return $this;
    }

    public function removeCommunity(Community $community): self
    {
        if ($this->communities->contains($community)) {
            $this->communities->removeElement($community);
            // set the owning side to null (unless already changed)
            if ($community->getGame() === $this) {
                $community->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->addGame($this);
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        if ($this->groups->contains($group)) {
            $this->groups->removeElement($group);
            $group->removeGame($this);
        }

        return $this;
    }

    /**
     * Sets createdAt.
     *
     * @param  \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Returns createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets updatedAt.
     *
     * @param  \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Returns updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}
