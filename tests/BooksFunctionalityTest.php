<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BooksFunctionalityTest extends WebTestCase
{
    public function testBooksLink()
    {
        $client = static::createClient();
        $client->request('GET', '/books');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNewBookLink()
    {
        $client = static::createClient();
        $client->request('GET', '/books/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditBooksLink()
    {
        $client = static::createClient();
        $client->request('GET', '/books/1/edit');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testDeleteBooksLink()
    {
        $client = static::createClient();
        $client->request('DELETE', '/books/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


}
