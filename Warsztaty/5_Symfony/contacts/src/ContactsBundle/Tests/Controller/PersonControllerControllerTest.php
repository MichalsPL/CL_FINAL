<?php

namespace ContactsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonControllerControllerTest extends WebTestCase
{
    public function testCreateform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'new');
    }

    public function testCreatenew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'new');
    }

    public function testCreatemodifyform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CreateModifyForm');
    }

    public function testModify()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Modify');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Delete');
    }

    public function testShowone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ShowOne');
    }

    public function testShowall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ShowAll');
    }

}
