<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CommunityTournamentRepository")
 */
class CommunityTournament extends Tournament
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Community", inversedBy="tournaments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $community;

    public function getCommunity(): ?Community
    {
        return $this->community;
    }

    public function setCommunity(?Community $community): self
    {
        $this->community = $community;

        return $this;
    }
}