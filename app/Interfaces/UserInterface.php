<?php 
namespace App\Interfaces;

interface UserInterface 
{
    public function getUsersByCategoriaSubscription(string $categoriaId);
}