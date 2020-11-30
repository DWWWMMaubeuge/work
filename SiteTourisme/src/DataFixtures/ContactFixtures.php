<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Contact;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 10; $i++) {

            $contact = new Contact();
            $contact->setCivilite("Monsieur");
            $contact->setNom("Jeanne - $i");
            $contact->setPrenom("Doe - $i");
            $contact->setTelephone("0358745966");
            $contact->setEmail("JeanDoe@wanadoo.com");
            $contact->setObjet("Message de remplissage");
            $contact->setMessage("Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit. Nulla in massa vitae dolor accumsan porttitor 
            ut ut est. Nulla in libero ut sapien tempus vulputate non sed 
            massa. Suspendisse commodo arcu at euismod auctor. Etiam non 
            augue quis diam sodales finibus. Maecenas ultricies dignissim 
            imperdiet. Praesent in leo vel metus tempus ultrices. Vivamus 
            sit amet viverra risus. Nam eget nibh at orci iaculis lobortis 
            faucibus at nibh. Phasellus ut risus id sapien feugiat mollis. 
            Integer blandit, metus a finibus venenatis, nulla nisi ultricies 
            est, a dignissim lorem justo sed felis. Phasellus mattis dignissim 
            tempus. Nulla facilisi.");
            $contact->setCreatedAt(new \DateTime());

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
