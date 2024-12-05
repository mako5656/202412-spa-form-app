<?php

declare(strict_types=1);

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class PokeAPI
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pokeapi.co/api/v2/',
        ]);
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function fetchPokemon(string $name): array
    {
        $response = $this->client->request('GET', 'pokemon/' . $name);
        $responseBody = $response->getBody()->getContents();

        return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
    }
}
