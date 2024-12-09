<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testSomething(): void
    {

        $client = static::createClient();
        $client->request('GET', '/product');



        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());


        $array = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("Laptop", $array[0]['name']);
        $this->assertEquals("1200", $array[0]['price']);

        $this->assertEquals("Smartphone", $array[1]['name']);
        $this->assertEquals("800", $array[1]['price']);

    }
}