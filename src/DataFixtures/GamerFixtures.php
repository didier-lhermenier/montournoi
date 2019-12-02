<?php

namespace App\DataFixtures;

use App\Entity\Gamer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class GamerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $gamer1 = new Gamer();
        $gamer1->setName("Alain Térieur");
        $gamer1->setPseudo("Alex");
        $gamer1->setManager($this->getReference("manager1"));
        $manager->persist($gamer1);
        $this->setReference("gamer1", $gamer1);

        $gamer2 = new Gamer();
        $gamer2->setName("Bertrand Tardif");
        $gamer2->setPseudo("Bebert");
        $gamer2->setManager($this->getReference("manager1"));
        $manager->persist($gamer2);
        $this->setReference("gamer2", $gamer2);

        $gamer3 = new Gamer();
        $gamer3->setName("Christophe Tarrière");
        $gamer3->setPseudo("Chris");
        $gamer3->setManager($this->getReference("manager1"));
        $manager->persist($gamer3);
        $this->setReference("gamer3", $gamer3);

        $gamer4 = new Gamer();
        $gamer4->setName("Damien Legendre");
        $gamer4->setPseudo("Damdam");
        $gamer4->setManager($this->getReference("manager1"));
        $manager->persist($gamer4);
        $this->setReference("gamer4", $gamer4);

        $gamer5 = new Gamer();
        $gamer5->setName("Eric Larsen");
        $gamer5->setPseudo("Riton");
        $gamer5->setManager($this->getReference("manager1"));
        $manager->persist($gamer5);
        $this->setReference("gamer5", $gamer5);

        $gamer6 = new Gamer();
        $gamer6->setName("France Galles");
        $gamer6->setPseudo("Fgt");
        $gamer6->setManager($this->getReference("manager1"));
        $manager->persist($gamer6);
        $this->setReference("gamer6", $gamer6);

        $gamer7 = new Gamer();
        $gamer7->setName("Grégoire Lenoir");
        $gamer7->setPseudo("Greg");
        $gamer7->setManager($this->getReference("manager1"));
        $manager->persist($gamer7);
        $this->setReference("gamer7", $gamer7);

        $gamer8 = new Gamer();
        $gamer8->setName("Henri Golant");
        $gamer8->setPseudo("Gogol");
        $gamer8->setManager($this->getReference("manager1"));
        $manager->persist($gamer8);
        $this->setReference("gamer8", $gamer8);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return array(
            ManagerFixtures::class
        );
    }
}