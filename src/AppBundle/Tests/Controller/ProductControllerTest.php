<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/list');
    }

    public function testAddtocart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}/add-to-cart');
    }

    public function testBasket()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/basket');
    }

    public function testRemovefromcart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}-remove-from-cart');
    }

    public function testClearbasket()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/clear-basket');
    }

}
