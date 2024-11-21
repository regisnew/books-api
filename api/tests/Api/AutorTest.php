<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class AutorTest extends ApiTestCase
{
    public function testCreateAutor(): void
    {
        static::createClient()->request('POST', '/autors', [
            'json' => [
                'nome' => 'Rodrigo Régis',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Autor',
            '@type' => 'Autor',
            'nome' => 'Rodrigo Régis',
        ]);
    }
}
