<?php

// tests/Service/StockManagerTest.php
namespace App\Tests\Service;

use App\Entity\Product;
use App\Service\StockManager;
use PHPUnit\Framework\TestCase;

class StockManagerTest extends TestCase
{
    public function testReduceStock(): void
    {
        $product = new Product();
        $product->setName('Laptop')->setPrice(1200)->setStock(10);

        $manager = new StockManager();
        $manager->reduceStock($product, 2);

        $this->assertEquals(8, $product->getStock());
    }

    public function testReduceStockWithInvalidQuantity(): void
    {
        $product = new Product();
        $product->setName('Laptop')->setPrice(1200)->setStock(10);

        $manager = new StockManager();

        $this->expectException(\InvalidArgumentException::class);
        $manager->reduceStock($product, 15); // Trop de stock à réduire
    }
}