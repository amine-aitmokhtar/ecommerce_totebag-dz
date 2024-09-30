<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_index')]
    public function index(): Response
    {
        // Simuler des articles dans le panier
        $cartItems = [
            ['name' => 'Tote Bag 1', 'price' => 2500],
            ['name' => 'Tote Bag 2', 'price' => 1000],
        ];

        return $this->json($cartItems);
    }

    #[Route('/cart/add/{id}', name: 'cart_add')]
    public function add(int $id): Response
    {
        return $this->json(['message' => 'Article ajouté au panier', 'product_id' => $id]);
    }
}
