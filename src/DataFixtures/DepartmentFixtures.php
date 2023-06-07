<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Department;

class DepartmentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dept = new Department();
        $dept->setDeptName('Manager');
        $dept->addUser($this->getReference('user-1'));
        
        $manager->persist($dept);
        $manager->flush();
    }
}
