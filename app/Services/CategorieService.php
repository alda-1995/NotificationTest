<?php

namespace App\Services;

use App\Repositories\CategorieRepository;

class CategorieService
{
    protected $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    /**
     * The function `getCategoriesList` retrieves a list of all active categories.
     * 
     * @return The `getCategoriesList` function is returning a list of all active categories fetched
     * from the `categorieRepository`.
     */
    public function getCategoriesList(){
        $listCategories = $this->categorieRepository->getAllCategoriesActive();
        return $listCategories;
    }
}
