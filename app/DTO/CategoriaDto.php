<?php

namespace App\DTO;

class CategoriaDto
{
    public string $categoriaId;
    public string $name;

    public function __construct(string $categoriaId, string $name)
    {
        $this->categoriaId = $categoriaId;
        $this->name = $name;
    }
}
