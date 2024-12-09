<?php

namespace App\Tests\Repository;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    public function setup(): void
    {
        self::bootKernel();
        $entityManager = static::getContainer()->get('doctrine')->getManager();
        $product = $entityManager->getRepository(Product::class)->findAll();

        foreach ($product as $products) {
            $entityManager->remove($products);
        }

        $entityManager->flush();



    }

    public function testFindExpensiveProduct(): void
    {
        self::bootKernel();
        $entityManager = static::getContainer()->get('doctrine')->getManager();
        $product1 = new Product();
        $product1->setName('Cheap Product')->setPrice(50);
        $entityManager->persist($product1);

        $product2 = new Product();
        $product2->setName('Expensive product')->setPrice(150);
        $entityManager->persist($product2);

        $entityManager->flush();

        $repository = $entityManager->getRepository(Product::class);
        $result = $repository->findExpensiveProducts(100);

        $this->assertCount(1, $result);
        $this->assertEquals('Expensive product', $result[0]->getName());
    }
}