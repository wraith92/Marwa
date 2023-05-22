<?php

namespace App\Tests\Fonctional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class basicTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }
}
