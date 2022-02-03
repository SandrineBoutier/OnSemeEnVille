<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    const TAGS = [
        'Biodiversité',
        'Botanique',
        'Faune',
        'permaculture',
        'Evènements au jardin',
        'Evènements extérieurs',
        'Convivialité',
        'Mare',
        'Bricolage',
        'Plantations',
        'Arrosage',
        'Trucs et Astuces'
    ];
    
    public function load(ObjectManager $manager)
    {
        foreach (self:: TAGS as $key => $tagName){
            $tag = new Tag();
            $tag->setTag($tagName);
            $manager->persist($tag);
        }
               
        $manager->flush();
    }
}