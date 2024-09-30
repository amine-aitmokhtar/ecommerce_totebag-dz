<?php

namespace App\DataFixtures;

use App\Entity\ToteBag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToteBagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $toteBag = new ToteBag();
            $toteBag->setName('Tote Bag ' . $i);
            $toteBag->setDescription('Description pour Tote Bag ' . $i);
            $toteBag->setPrice(mt_rand(10, 50));
            $toteBag->setImageUrl('https://example.com/totebag' . $i . '.jpg');

            $manager->persist($toteBag);
        }

        $manager->flush();
    }
}
