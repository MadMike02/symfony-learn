<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Guilty');
        $movie->setName('The Guilty');
        $movie->setReleaseYear('2023');
        $movie->setDescription('Thriller/Psychology');
        $movie->setImagePath('theGuilty.jpg');
        $movie->addActor($this->getReference('actor-1'));

        $movie2 = new Movie();
        $movie2->setTitle('The Dark Knight');
        $movie2->setName('The Dark Knight');
        $movie2->setReleaseYear('2010');
        $movie2->setDescription('Action/Thriller');
        $movie2->setImagePath('theDarkKnight.jpg');
        $movie2->addActor($this->getReference('actor-2'));
        
        $manager->persist($movie);
        $manager->persist($movie2);
        $manager->flush();
    }
}
