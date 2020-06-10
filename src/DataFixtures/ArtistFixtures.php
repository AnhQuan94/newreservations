<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\DataFixtures\AgentFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtistFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $artists = [
            ['firstname'=>'Daniel','lastname'=>'Marcelin','agent'=>'Marcelin@gmail.com'],
            ['firstname'=>'Philippe','lastname'=>'Laurent','agent'=>'Marcelin@gmail.com'],
            ['firstname'=>'Marius','lastname'=>'Von Mayenburg','agent'=>'Bob@gmail.com'],
            ['firstname'=>'Olivier','lastname'=>'Boudon','agent'=>'David@gmail.com'],
            ['firstname'=>'Anne Marie','lastname'=>'Loop','agent'=>'Marcelin@gmail.com'],
            ['firstname'=>'Pietro','lastname'=>'Varasso','agent'=>'Bob@gmail.com'],
            ['firstname'=>'Laurent','lastname'=>'Caron','agent'=>'Marcelin@gmail.com'],
            ['firstname'=>'Élena','lastname'=>'Perez','agent'=>'David@gmail.com'],
            ['firstname'=>'Guillaume','lastname'=>'Alexandre','agent'=>NULL],
            ['firstname'=>'Claude','lastname'=>'Semal','agent'=>'Marcelin@gmail.com'],
            ['firstname'=>'Laurence','lastname'=>'Warin','agent'=>'Marcelin@gmail.com'],
            ['firstname'=>'Pierre','lastname'=>'Wayburn','agent'=>NULL],
            ['firstname'=>'Gwendoline','lastname'=>'Gauthier','agent'=>'Marcelin@gmail.com'],
        ];
        
        foreach ($artists as $record) {
            $artist = new Artist();
            $artist->setFirstname($record['firstname']);
            $artist->setLastname($record['lastname']);

                if(!empty($record['agent'])){
                $artist->setAgent($this->getReference($record['agent']));
                }
            

            $manager->persist($artist);

            $this->addReference(
                $record['firstname']."-".$record['lastname'],
                $artist
        );

        }

        $manager->flush();
    }
    public function getDependencies() {
        return [
            AgentFixtures::class,
        ];
    }
}
