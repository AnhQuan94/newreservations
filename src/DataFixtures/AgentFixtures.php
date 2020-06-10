<?php

namespace App\DataFixtures;

use App\Entity\Agent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AgentFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $agents = [
            ['name'=>'Daniel','email'=>'Marcelin@gmail.com'],
            ['name'=>'Bob','email'=>'Bob@gmail.com'],
            ['name'=>'David','email'=>'David@gmail.com'],
          
        ];
        
        foreach ($agents as $record) {
            $agent = new Agent();
            $agent->setName($record['name']);
            $agent->setEmail($record['email']);

            $this->addReference($record['email'],$agent);

            $manager->persist($agent);
        }


        $manager->flush();
    }
}
