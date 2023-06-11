<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor = new Actor();
        $actor->setName('Jake Gyllenhaal');
        $this->addReference('actor-1',$actor);

        $actor2 = new Actor();
        $actor2->setName('Christian Bale');
        $this->addReference('actor-2',$actor2);

        
        $manager->persist($actor);
        $manager->persist($actor2);
        $manager->flush();
    }
}
