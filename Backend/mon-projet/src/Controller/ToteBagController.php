<?php

namespace App\Controller;

use App\Entity\ToteBag;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ToteBagController extends AbstractController
{
    // Route pour lister tous les totebags
    #[Route('/tote-bags', name: 'tote_bags_list', methods: ['GET'])]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $toteBags = $em->getRepository(ToteBag::class)->findAll();
        return $this->json($toteBags);
    }

    // Route pour afficher un totebag par son ID
    #[Route('/tote-bag/{id}', name: 'tote_bag_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em): JsonResponse
    {
        $toteBag = $em->getRepository(ToteBag::class)->find($id);

        if (!$toteBag) {
            return $this->json(['error' => 'Tote Bag not found'], 404);
        }

        return $this->json($toteBag);
    }

    // Route pour créer un totebag
    #[Route('/tote-bag/create', name: 'tote_bag_create', methods: ['POST'])]
    public function create(EntityManagerInterface $em): JsonResponse
    {
        $toteBag = new ToteBag();
        $toteBag->setName('Nouveau Tote Bag');
        $toteBag->setDescription('Description pour un nouveau tote bag');
        $toteBag->setPrice(25.99);
        $toteBag->setImageUrl('https://example.com/image.jpg');

        $em->persist($toteBag);
        $em->flush();

        return $this->json([
            'message' => 'Tote Bag créé avec succès!',
            'tote_bag' => $toteBag
        ]);
    }
}
