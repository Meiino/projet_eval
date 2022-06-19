<?php

namespace App\DataFixtures;

use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $employes = new Employes();
        $employes->setPrenom('Malika')
                 ->setNom('Secouss')
                 ->setTelephone('0102030405')
                 ->setEmail('malik.sec@yahoo.fr')
                 ->setAdresse('4 rue desCités')
                 ->setPoste('Zoneuse')
                 ->setSalaire(0.50)
                 ->setDateDeNaissance(YYYY-MM-DD);

        $manager->persist($employes);

        $manager->flush();
    }
}
