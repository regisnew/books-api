<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class AssuntoTest extends ApiTestCase
{
    public function testCreateAssunto(): void
    {
        static::createClient()->request('POST', '/assuntos', [
            'json' => [
                'descricao' => 'Tecnologia',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Assunto',
            '@type' => 'Assunto',
            'descricao' => 'Tecnologia',
        ]);
    }
}
