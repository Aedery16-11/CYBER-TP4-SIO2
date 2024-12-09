<?php

namespace App\Tests\Service;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Service\OrderCalculator;
use PHPUnit\Framework\TestCase;

class OrderCalculatorTest extends TestCase
{
    public function testCalculateTotal(): void
    {
        $orderCalculator = new OrderCalculator();

        $order = new Order();
        $orderItem = new OrderItem();
        $orderItem->setQuantity(15);
        $orderItem->setUnitPrice(12.5);
        $order->addOrderItemOfOrder($orderItem);
        $this->assertEquals(187.5, $orderCalculator->calculateTotal($order));
    }
    public function testApplyDiscount()
    {
        $orderCalculator = new OrderCalculator();

        $order = new Order();
        $orderItem = new OrderItem();

        $total = 187.5;
        $discount = 20;
        $order->addOrderItemOfOrder($orderItem);

        $this->assertEquals(150, $orderCalculator->applyDiscount($total, $discount));
    }
}
