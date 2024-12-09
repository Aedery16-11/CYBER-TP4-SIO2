<?php

namespace App\Tests\Unit;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Repository\OrderRepository;
use App\Service\OrderCalculator;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testCalculateTotal(): void
    {
        $order = new Order();
        $item1 = new OrderItem();
        $item2 = new OrderItem();

        $order->addOrderItemOfOrder($item1)
            ->addOrderItemOfOrder($item2);

        $this->assertCount(2, $order->getOrderItemOfOrder());
        $this->assertEquals($order, $item1->getOrderOfOrderItem());
        $this->assertEquals($order, $item2->getOrderOfOrderItem());

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
