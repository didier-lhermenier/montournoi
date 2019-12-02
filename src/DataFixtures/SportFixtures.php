<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SportFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sport1 = new Sport();
        $sport1->setName("Palets bretons");
        $sport1->setAreaName("planche");
        $sport1->setAreaQty(4);
        $sport1->setLetter("P");
        $sport1->setTournament($this->getReference("triathlon"));
        $manager->persist($sport1);
        $this->setReference("palets", $sport1);

        $sport2 = new Sport();
        $sport2->setName("Baby-foot");
        $sport2->setAreaName("baby");
        $sport2->setAreaQty(2);
        $sport2->setLetter("B");
        $sport2->setTournament($this->getReference("triathlon"));
        $manager->persist($sport2);
        $this->setReference("baby-foot", $sport2);

        $sport3 = new Sport();
        $sport3->setName("Fléchettes");
        $sport3->setAreaName("cible");
        $sport3->setAreaQty(3);
        $sport3->setLetter("F");
        $sport3->setTournament($this->getReference("triathlon"));
        $manager->persist($sport3);
        $this->setReference("flechettes", $sport1);

        $sport4 = new Sport();
        $sport4->setName("Tennis");
        $sport4->setAreaName("terrain");
        $sport4->setAreaQty(4);
        $sport4->setLetter("T");
        $sport4->setTournament($this->getReference("challenge"));
        $manager->persist($sport4);
        $this->setReference("tennis", $sport1);

        $sport5 = new Sport();
        $sport5->setName("Ping-pong");
        $sport5->setAreaName("table");
        $sport5->setAreaQty(8);
        $sport5->setLetter("P");
        $sport5->setTournament($this->getReference("challenge"));
        $manager->persist($sport5);
        $this->setReference("ping-pong", $sport1);

        $sport6 = new Sport();
        $sport6->setName("Badminton");
        $sport6->setAreaName("terrain");
        $sport6->setAreaQty(4);
        $sport6->setLetter("B");
        $sport6->setTournament($this->getReference("challenge"));
        $manager->persist($sport6);
        $this->setReference("badminton", $sport1);

        $sport7 = new Sport();
        $sport7->setName("Pétanque");
        $sport7->setAreaName("terrain");
        $sport7->setAreaQty(3);
        $sport7->setLetter("P");
        $sport7->setTournament($this->getReference("boules"));
        $manager->persist($sport7);
        $this->setReference("petanque", $sport1);

        $sport8 = new Sport();
        $sport8->setName("Boules bretonnes");
        $sport8->setAreaName("terrain");
        $sport8->setAreaQty(2);
        $sport8->setLetter("B");
        $sport8->setTournament($this->getReference("boules"));
        $manager->persist($sport8);
        $this->setReference("boule", $sport1);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return array(
            TournamentFixtures::class,
        );
    }
}
