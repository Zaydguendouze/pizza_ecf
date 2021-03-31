<?php

namespace App\DataFixtures;

use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SizeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création taille petite
        $size = new Size();
        $size->setSizeName("Petite")
            ->setSizePrice("0");
        $manager->persist($size);

        // Création taille moyenne
        $size = new Size();
        $size->setSizeName("Moyenne")
            ->setSizePrice("3");
        $manager->persist($size);

        // Création taille grande
        $size = new Size();
        $size->setSizeName("Grande")
            ->setSizePrice("6");
        $manager->persist($size);

        $manager->flush();
    }
}
