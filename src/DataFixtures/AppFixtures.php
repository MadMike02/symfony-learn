<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('John Doe');
        $user->setUMail('John@doe.com');
        $user->setStatus(1);

        $this->addReference('user-1',$user);
        $manager->persist($user);
        $manager->flush();
    }
}
