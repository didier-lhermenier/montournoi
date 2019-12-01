<?php

namespace App\DataFixtures;

use App\Entity\Manager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ManagerFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $manager1 = new Manager();
        $manager1->setUsername("Didier Lhermenier");
        $manager1->setPseudo("Didiou");
        $manager1->setEmail("lhermenier.didier@free.fr");
        $manager1->setPassword($this->encoder->encodePassword($manager1, '1234'));
        $manager1->setRoles(["ROLE_MANAGER"]);
        $this->setReference("manager1", $manager1);
        $manager->persist($manager1);

        $manager2 = new Manager();
        $manager2->setUsername("Nathalie Ribourg");
        $manager2->setPseudo("Nathou");
        $manager2->setEmail("nathalie.r@gmail.com");
        $manager2->setPassword($this->encoder->encodePassword($manager2, 'nat00'));
        $manager2->setRoles(["ROLE_MANAGER"]);
        $this->setReference("manager2", $manager2);
        $manager->persist($manager2);

        $manager3 = new Manager();
        $manager3->setUsername("Jules Vairn");
        $manager3->setPseudo("Juju");
        $manager3->setEmail("jvern@live.fr");
        $manager3->setPassword($this->encoder->encodePassword($manager3, 'juv3'));
        $manager3->setRoles(["ROLE_MANAGER"]);
        $this->setReference("manager3", $manager3);
        $manager->persist($manager3);

        $manager->flush();
    }
}
