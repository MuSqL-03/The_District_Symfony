<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'category_index')]
    public function index(CategorieRepository $categorieRepository)
    {
        $categories = $categorieRepository->findBy(['active' => true]);

        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
