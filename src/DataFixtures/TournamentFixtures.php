<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use App\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TournamentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tournament1 = new Tournament();
        $tournament1->setName("Triathlon de l'extrême");
        $tournament1->setIsFree(true);
        $tournament1->setLocation("Rennes - Stade de la forêt");
        $tournament1->setMaxGamers(16);
        $tournament1->setPrivate(false);
        $tournament1->setDateBegin("2019-12-21 9:00:00");
        $tournament1->setManager($this->getReference("manager1"));
        $tournament1->addSport(($this->getReference("palets"));
        $tournament1->addSport(($this->getReference("billard"));
        $tournament1->addSport(($this->getReference("baby-foot"));
        $manager->persist($tournament1);
        $this->setReference("triathlon", $tournament1);

        $tournament2 = new Tournament();
        $tournament2->setName("Challenge Les 3 raquettes");
        $tournament2->setIsFree(true);
        $tournament2->setLocation("Bruz - complexe sportif");
        $tournament2->setMaxGamers(64);
        $tournament2->setPrivate(false);
        $tournament2->setDateBegin("2019-12-28 9:00:00");
        $tournament2->setDateEnd("2019-12-29 19:00:00");
        $tournament2->setManager("manager1");
        $tournament1->addSport(($this->getReference("tennis"));
        $tournament1->addSport(($this->getReference("ping-pong"));
        $tournament1->addSport(($this->getReference("badminton"));
        $manager->persist($tournament2);
        $this->setReference("challenge", $tournament2);

        $tournament3 = new Tournament();
        $tournament3->setName("Les boules nocturnes");
        $tournament3->setIsFree(false);
        $tournament3->setLocation("Liffré");
        $tournament3->setMaxGamers(32);
        $tournament3->setPrivate(true);
        $tournament3->setDateBegin("2019-12-20 20:00:00");
        $tournament3->setManager("manager2");
        $tournament1->addSport(($this->getReference("Pétanque"));
        $tournament1->addSport(($this->getReference("boule"));
        $manager->persist($tournament3);
        $this->setReference("boules", $tournament3);

        $manager->flush();
    }


    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return array(
            ManagerFixtures::class,
            SportFixtures::class
        );
    }
}
