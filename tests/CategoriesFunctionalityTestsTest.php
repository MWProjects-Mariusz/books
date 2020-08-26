<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoriesFunctionalityTestsTest extends WebTestCase
{
    public function testShowBookLink()
    {
        $client = static::createClient();
        $client->request('GET', '/categories/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCategoriesLink()
    {
        $client = static::createClient();
        $client->request('GET', '/categories');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNewCategoryLink()
    {
        $client = static::createClient();
        $client->request('GET', '/categories/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditCategoriesLink()
    {
        $client = static::createClient();
        $client->request('GET', '/categories/1/edit');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testDeleteCategoriesLink()
    {
        $client = static::createClient();
        $client->request('DELETE', '/categories/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testShowCategoriesLink()
    {
        $client = static::createClient();
        $client->request('GET', '/categories/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
