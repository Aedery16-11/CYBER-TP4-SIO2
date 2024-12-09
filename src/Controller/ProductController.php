<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function list(): JsonResponse
    {

        $p1 = new Product();
        $p1->setName("Laptop");
        $p1->setPrice(1200);

        $p2 = new Product();
        $p2->setName("Smartphone");
        $p2->setPrice(800);

        return new JsonResponse([
            $p1->toArray(),
            $p2->toArray()
        ]);
    }


}