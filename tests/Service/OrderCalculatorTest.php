<?php

namespace App\Tests\Service;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Service\OrderCalculator;
use PHPUnit\Framework\TestCase;

class OrderCalculatorTest extends TestCase
{
    public function testSomething(): void
    {
        $orderCalculator = new OrderCalculator();

        $order = new Order();
        $orderItem = new OrderItem();
        $orderItem->setQuantity(15);
        $orderItem->setUnitPrice(12.5);
        $order->addOrderItemOfOrder($orderItem);
        $this->assertEquals(187.5, $orderCalculator->calculateTotal($order));
    }
}
