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

    public function getCategoriesList(){
        $listCategories = $this->categorieRepository->getAllCategoriesActive();
        return $listCategories;
    }
}
