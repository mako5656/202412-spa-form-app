<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\PokeAPI;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    #[Route('/api/search-pokemon', name: 'search-pokemon', methods: ['GET'])]
    public function searchPokemon(Request $request): JsonResponse {
        $pokemonName = $request->query->get('pokemonName');
        $pokemonInfo = (new PokeAPI())->fetchPokemon($pokemonName);

        return new JsonResponse([
            'name' => $pokemonInfo['name'],
            'sprites_front_default_url' => $pokemonInfo['sprites']['front_default'],
        ]);
    }
}
