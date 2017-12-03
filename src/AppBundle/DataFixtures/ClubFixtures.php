<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setBrand('Adidas');
        $club->setCapacity(80000);
        $club->setEmail('mensajes@realmadrid.com');
        $club->setFirstSeasons(86);
        $club->setFoundationYear(1902);
        $club->setImage('http://as00.epimg.net/img/comunes/fotos/fichas/equipos/large/1.png');
        $club->setName('Real Madrid Club de Fútbol');
        $club->setPhone('0034 913 984 300');
        $club->setPresident('Florentino Pérez Rodríguez');
        $club->setPressOfficer('Marta Santisteban López'); 
        $club->setSecondSeasons(0);
        $club->setStadium('Estadio Santiago Bernabéu');
        $club->setStadiumLength(105);
        $club->setStadiumWidth(68);
        $club->setSubscribers(63094);
        $manager->persist($club);
        
        $club = new Club();
        $club->setBrand('Nike');
        $club->setCapacity(30000);
        $club->setEmail('efmareo@realsporting.com');
        $club->setFirstSeasons(42);
        $club->setFoundationYear(1905);
        $club->setName('Real Sporting de Gijón SAD');
        $club->setImage('https://files.proyectoclubes.com/sporting/201609/662x372a_30140245escudo.jpg');
        $club->setPhone('0034 985 167 677');
        $club->setPresident('Javier Fernández Rodríguez');
        $club->setPressOfficer('José Luis Rubiera Fernández'); 
        $club->setSecondSeasons(43);
        $club->setStadium('Estadio El Molinón');
        $club->setStadiumLength(105);
        $club->setStadiumWidth(68);
        $club->setSubscribers(18000);
        $manager->persist($club);

        $manager->flush();
    }
}

