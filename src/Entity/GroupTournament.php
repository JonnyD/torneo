<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GroupTournamentRepository")
 */
class GroupTournament extends Tournament
{
    private $test = 'test';

    public function getText()
    {
        return $this->test;
    }

    public function setTest($test)
    {
        $this->test = $test;
    }
}