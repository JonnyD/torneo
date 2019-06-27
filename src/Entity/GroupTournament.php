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
    private $agroup;

    public function getAgroup(): ?Group
    {
        return $this->agroup;
    }

    public function setAgroup(?Group $agroup): self
    {
        $this->agroup = $agroup;

        return $this;
    }
}