<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class LivroTest extends ApiTestCase
{
    public function testCreateLivro(): void
    {
        static::createClient()->request('POST', '/livros', [
            'json' => [
                'titulo' => 'Aprendendo PHP',
                'autor' => ['/autors/1'],
                'assunto' => ['/assuntos/1'],
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Livro',
            '@type' => 'Livro',
            'titulo' => 'Aprendendo PHP',
        ]);
    }
}
