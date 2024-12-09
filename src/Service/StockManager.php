<?php

namespace App\Service;

use Doctrine\Common\Cache\Psr6\InvalidArgument;
use PHPUnit\Framework\InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class StockManager
{

    public function reduceStock(\App\Entity\Product $product, int $int)
    {
        if ($int > $product->getStock())
        {
           throw new \InvalidArgumentException("Trop de stock à réduire");
        }
        $product->setStock($product->getStock() - $int);
    }
}