<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Club;
use AppBundle\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $club = $manager->getRepository('AppBundle:Club')->findOneBy(array('name' => 'Real Madrid Club de Fútbol'));
        if($club instanceof Club)
        {
            $player = new Player();
            $player->setAssists(3);
            $player->setBirthdate(new \DateTime('1992-04-21'));
            //$player->setBirthplace($birthplace);
            $player->setClub($club);
            $player->setDorsal(22);
            $player->setGoals(4);
            $player->setHeight(176);
            $player->setImage('http://files.laliga.es/jugadores/201708/250x250_23184730isco.jpg');
            $player->setMinutes(895);
            $player->setName('Francisco Román Alarcón Suárez');
            $player->setNationality('Española');
            $player->setNickname('Isco');
            $player->setPosition('Centrocampista');
            $player->setShots(16);
            $player->setWeight(74);
            $manager->persist($player);

            $manager->flush();
        }
    }
}

