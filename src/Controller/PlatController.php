<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PlatRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;

class PlatController extends AbstractController
{
    public function platsByCategory(int $id, PlatRepository $platRepository, CategorieRepository $categorieRepository): Response
    {
        $plats = $platRepository->findBy(['categorie' => $id, 'active' => true]);
        $category = $categorieRepository->find($id);

        return $this->render('plat/index.html.twig', [
            'plats' => $plats,
            'category' => $category,
        ]);
    }
}

