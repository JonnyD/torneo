<?php

namespace App\DataFixtures;

use App\Entity\Platform;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlatformFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $pc = $this->createPlatform("PC");
        $playstation1 = $this->createPlatform("PlayStation 1");
        $playstation2 = $this->createPlatform("PlayStation 2");
        $playstation3 = $this->createPlatform("PlayStation 3");
        $playstation4 = $this->createPlatform("PlayStation 4");

        $xboxOne = $this->createPlatform("Xbox One");
        $xbox = $this->createPlatform("Xbox");
        $xbox360 = $this->createPlatform("Xbox 360");
        $switch = $this->createPlatform("Switch");
        $mobile = $this->createPlatform("Mobile");

        $psVita = $this->createPlatform("PS Vita");
        $psp = $this->createPlatform("PSP");
        $wiiU = $this->createPlatform("Wii U");
        $gamecube = $this->createPlatform("Gamecube");
        $nintendo64 = $this->createPlatform("Nintendo 64");

        $snes = $this->createPlatform("SNES");
        $nes = $this->createPlatform("NES");
        $dreamcast = $this->createPlatform("Dreamcast");
        $saturn = $this->createPlatform("Saturn");
        $megadrive = $this->createPlatform("Megadrive");

        $masterSystem = $this->createPlatform("Master System");
        $threeDS = $this->createPlatform("3DS");
        $ds = $this->createPlatform("DS");
        $gameBoy = $this->createPlatform("Game Boy");
        $neoGeo = $this->createPlatform("Neo Geo");

        $otherPlatform = $this->createPlatform("Other Platform");
        $notAVideoGame = $this->createPlatform("Not a video game");

        $manager->persist($pc);
        $manager->persist($playstation1);
        $manager->persist($playstation2);
        $manager->persist($playstation3);
        $manager->persist($playstation4);

        $manager->persist($xboxOne);
        $manager->persist($xbox);
        $manager->persist($xbox360);
        $manager->persist($switch);
        $manager->persist($mobile);

        $manager->persist($psVita);
        $manager->persist($psp);
        $manager->persist($wiiU);
        $manager->persist($gamecube);
        $manager->persist($nintendo64);

        $manager->persist($snes);
        $manager->persist($nes);
        $manager->persist($dreamcast);
        $manager->persist($saturn);
        $manager->persist($megadrive);

        $manager->persist($masterSystem);
        $manager->persist($threeDS);
        $manager->persist($ds);
        $manager->persist($gameBoy);
        $manager->persist($neoGeo);

        $manager->persist($otherPlatform);
        $manager->persist($notAVideoGame);
        $manager->flush();
    }

    private function createPlatform(string $name): Platform
    {
        $platform = new Platform();
        $platform->setName($name);
        return $platform;
    }
}
