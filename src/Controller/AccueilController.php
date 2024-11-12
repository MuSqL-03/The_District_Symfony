<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PlatRepository;
use App\Repository\CategorieRepository;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(PlatRepository $platRepository, CategorieRepository $categorieRepository )
    {

        $categories = $categorieRepository->findBy(['active' => true]);
        $plats = $platRepository->findBy(['active' => true]);

        $categories = array_slice($categories, 0, 3);
        $plats = array_slice($plats, 0, 3);






        return $this->render('accueil/index.html.twig', [
            'categories' => $categories,
            'plats' => $plats,

        ]);
    }
}
