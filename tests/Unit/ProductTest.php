<?php

namespace App\Tests\Unit;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct(): void
    {
        $product = new Product();

        $product->setPrice(15);
        $product->setName("Product 1");

        $this->assertEquals(15, $product->getPrice());
        $this->assertEquals("Product 1", $product->getName());
    }
}
