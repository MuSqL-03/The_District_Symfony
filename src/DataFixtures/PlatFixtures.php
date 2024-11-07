<?php

namespace App\DataFixtures;

use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PlatFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Array of plat data
        $plats = [
            [
                'libelle' => 'District Burger',
                'description' => 'Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits.',
                'prix' => 8.00,
                'image' => 'hamburger.jpg',
                'id_categorie' => 5,
                'active' => true
            ],
            [
                'libelle' => 'Pizza Bianca',
                'description' => 'Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.',
                'prix' => 14.00,
                'image' => 'pizza-salmon.png',
                'id_categorie' => 4,
                'active' => true
            ],
            [
                'libelle' => 'Buffalo Chicken Wrap',
                'description' => 'Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.',
                'prix' => 5.00,
                'image' => 'buffalo-chicken.webp',
                'id_categorie' => 9,
                'active' => true
            ],
            [
                'libelle' => 'Cheeseburger',
                'description' => 'Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.',
                'prix' => 8.00,
                'image' => 'cheesburger.jpg',
                'id_categorie' => 5,
                'active' => true
            ],
            [
                'libelle' => 'Spaghetti aux légumes',
                'description' => 'Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.',
                'prix' => 10.00,
                'image' => 'spaghetti-legumes.jpg',
                'id_categorie' => 10,
                'active' => true
            ],
            [
                'libelle' => 'Salade César',
                'description' => 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.',
                'prix' => 7.00,
                'image' => 'cesar_salad.jpg',
                'id_categorie' => 13,
                'active' => true
            ],
            [
                'libelle' => 'Pizza Margherita',
                'description' => 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...',
                'prix' => 14.00,
                'image' => 'pizza-margherita.jpg',
                'id_categorie' => 4,
                'active' => true
            ],
            [
                'libelle' => 'Courgettes farcies au quinoa et duxelles de champignons',
                'description' => 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!',
                'prix' => 8.00,
                'image' => 'courgettes_farcies.jpg',
                'id_categorie' => 14,
                'active' => true
            ],
            [
                'libelle' => 'Lasagnes',
                'description' => 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.',
                'prix' => 12.00,
                'image' => 'lasagnes_viande.jpg',
                'id_categorie' => 10,
                'active' => true
            ],
            [
                'libelle' => 'Tagliatelles au saumon',
                'description' => 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui vous assure un véritable régal!',
                'prix' => 12.00,
                'image' => 'tagliatelles_saumon.webp',
                'id_categorie' => 10,
                'active' => true
            ],
        ];

        foreach ($plats as $data) {
            $plat = new Plat();
            $plat->setLibelle($data['libelle']);
            $plat->setDescription($data['description']);
            $plat->setPrix($data['prix']);
            $plat->setImage($data['image']);
            $plat->setActive($data['active']);

            // Set the category reference
            $categorie = $this->getReference('categorie_' . $data['id_categorie']);
            $plat->setCategorie($categorie);

            $manager->persist($plat);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategorieFixtures::class,
        ];
    }
}
