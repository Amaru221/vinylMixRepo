<?php

namespace App\DataFixtures;

use App\Entity\VinylMix;
use App\Factory\VinylMixFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        VinylMixFactory::createMany(100);
        // $mix = new VinylMix();
        // $mix->setTitle('Do you Remember... Phil Collins?!');
        // $mix->setDescription('A pure mix of drummers turned singers!');
        // $genres = ['pop', 'rock', 'heavy-metal'];
        // $mix->setGenre($genres[array_rand($genres)]);
        // $mix->setTrackCount(rand(5,20));
        // $mix->setVotes(rand(-50,50));
        // $manager->persist($mix);
        // $manager->flush();

    }
}