<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = $this->createUser("test1@test.com", "John", "Doe", "pass", ["ROLE_ADMIN"]);

        $manager->persist($user);
        $manager->flush();
    }

    private function createUser(string $email, string $firstName, string $lastName, string $password, array $roles)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);

        $encoded = $this->encoder->encodePassword($user, $password);

        $user->setPassword($encoded);
        $user->setRoles($roles);
        return $user;
    }
}
