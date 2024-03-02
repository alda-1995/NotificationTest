<?php

namespace App\Repositories;

use App\Interfaces\CategoriaInterface;
use App\Models\Categorie;

class CategorieRepository implements CategoriaInterface
{
    public function getAllCategoriesActive()
    {
        $queryCategorie = Categorie::where("status", true)->limit(100)->get();
        $listCategories = $queryCategorie->map(function($categoria){
            return [ 'value' => $categoria->category_id, 'label' => ucfirst($categoria->name)];
        })->toArray();
        return $listCategories ?: [];
    }
}
