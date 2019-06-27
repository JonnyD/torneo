<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={"access_control"="in_array(user, communityUsers)"}
 *     }
 * )
 *
 * @ORM\Entity(repositoryClass="App\Repository\CommunityTournamentRepository")
 * @ORM\Table(name="community_tournaments")
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