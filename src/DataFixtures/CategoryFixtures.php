<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            1 =>['name' => 'Actualité'],
            2 =>['name' => 'Chantiers'],
            3 =>['name' => 'Projets'],
            4 =>['name' => 'Ateliers'],
            5 =>['name' => 'Communiqués'],
            6 =>['name' => 'Ressources'],
            7 =>['name' => 'Evènements'],
            8 =>['name' => 'Recettes'],
            9 =>['name' => 'Divers'],
        ];
        
        foreach($categories as $key => $value){
            $category = new Category();
            $category->setName($value['name']);
            $manager->persist($category);
        }
        
        $manager->flush();
    }
}