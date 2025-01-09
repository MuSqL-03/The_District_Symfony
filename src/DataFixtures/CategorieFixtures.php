<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            ['id' => 4,  'libelle' => 'Pizza', 'image' => 'pizza_cat.jpg', 'active' => true],
            ['id' => 5,  'libelle' => 'Burger', 'image' => 'burger_cat.jpg', 'active' => true],
            ['id' => 9,  'libelle' => 'Wraps', 'image' => 'wrap_cat.jpg', 'active' => true],
            ['id' => 10, 'libelle' => 'Pasta', 'image' => 'pasta_cat.jpg', 'active' => true],
            ['id' => 11, 'libelle' => 'Sandwich', 'image' => 'sandwich_cat.jpg', 'active' => true],
            ['id' => 12, 'libelle' => 'Asian Food', 'image' => 'asian_food_cat.jpg', 'active' => false],
            ['id' => 13, 'libelle' => 'Salade', 'image' => 'salade_cat.jpg', 'active' => true],
            ['id' => 14, 'libelle' => 'Veggie', 'image' => 'veggie_cat.jpg', 'active' => true],
        ];

        foreach ($categories as $data) {
            $categorie = new Categorie();
            $categorie->setLibelle($data['libelle']);
            $categorie->setImage($data['image']);
            $categorie->setActive($data['active']);

            // Add a reference to the category
            $this->addReference('categorie_' . $data['id'], $categorie);

            $manager->persist($categorie);
        }

        $manager->flush();
    }
}