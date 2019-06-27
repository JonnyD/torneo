<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GroupTournamentRepository")
 * @ORM\Table(name="group_tournaments")
 */
class GroupTournament extends Tournament
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Group", inversedBy="tournaments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $group;

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(Group $group): self
    {
        $this->group = $group;

        return $this;
    }
}