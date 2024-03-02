<?php

namespace App\Repositories;

use App\Interfaces\CategoriaInterface;
use App\Models\Categorie;

class CategorieRepository implements CategoriaInterface
{
   /**
    * This PHP function retrieves all active categories, formats them into an array with 'value' and
    * 'label' keys, and returns the result.
    * 
    * @return An array of active categories with their `category_id` as the value and the capitalized
    * `name` as the label is being returned. If there are no active categories, an empty array is
    * returned.
    */
    public function getAllCategoriesActive()
    {
        $queryCategorie = Categorie::where("status", true)->limit(100)->get();
        $listCategories = $queryCategorie->map(function($categoria){
            return [ 'value' => $categoria->category_id, 'label' => ucfirst($categoria->name)];
        })->toArray();
        return $listCategories ?: [];
    }
}
