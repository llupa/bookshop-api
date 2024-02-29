<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class ForceIriTest extends ApiTestCase
{
    public function testIsItIri()
    {
        self::bootKernel();

        $client = $this->createClient();

        $response = $client->request('POST', '/api/books', [
            'json' => ['title' => 'Buzz Bar'],
            'headers' => ['Content-Type' => 'application/ld+json', 'Accept' => 'application/ld+json']
        ]);
        $book = $response->toArray(false);
        dump($book);

        $response = $client->request('POST', '/api/shelves', [
            'json' => [
                'name' => 'waiting',
                'shelfQueues' => [
                    [
                        'position' => 10,
                        'book' => $book['@id'],
                    ]
                ]
            ],
            'headers' => ['Content-Type' => 'application/ld+json', 'Accept' => 'application/ld+json']
        ]);
        $shelf = $response->toArray(false);
        dump($shelf);
    }
}
