<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/tote-bags", name="admin_tote_bags_")
 */
class AdminToteBagController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        // Logique pour afficher la liste des tote bags
        return $this->json(['message' => 'Admin Tote Bags List']);
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(): JsonResponse
    {
        // Logique pour créer un tote bag
        return $this->json(['message' => 'Admin Create Tote Bag']);
    }
}
