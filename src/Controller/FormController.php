<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\FormDTO;
use App\Service\PokeAPI;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    #[Route('/api/search-pokemon', name: 'search-pokemon', methods: ['POST'])]
    public function searchPokemon(
        #[MapRequestPayload] FormDTO $formDTO
    ): JsonResponse {
        $pokemonInfo = (new PokeAPI())->fetchPokemon($formDTO->getPokemonName());

        return new JsonResponse([
            'name' => $pokemonInfo['name'],
            'sprites_front_default_url' => $pokemonInfo['sprites']['front_default'],
        ]);
    }
}
