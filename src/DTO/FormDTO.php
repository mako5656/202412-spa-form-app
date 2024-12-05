<?php

declare(strict_types=1);

namespace App\DTO;

class FormDTO
{
    private string $pokemonName;

    public function getPokemonName(): string
    {
        return $this->pokemonName;
    }

    public function setPokemonName(string $pokemonName): self
    {
        $this->pokemonName = $pokemonName;

        return $this;
    }
}
