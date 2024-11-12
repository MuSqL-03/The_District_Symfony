<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatRepository;

class AllPlatsController extends AbstractController
{
    #[Route('/all/plats', name: 'app_all_plats')]
    public function index(PlatRepository $platRepository)
    {

        $plats = $platRepository->findBy(['active' => true]);

        return $this->render('all_plats/index.html.twig', [
            'plats' => $plats,
        ]);
    }
}
