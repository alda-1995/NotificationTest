<?php

namespace App\Http\Controllers;

use App\Services\CategorieService;
use App\Services\SubscriptionService;

class HomeController extends Controller
{
    protected $categorieService;
    protected $subscriptionService;

    public function __construct(CategorieService $categorieService, SubscriptionService $subscriptionService)
    {
        $this->categorieService = $categorieService;
        $this->subscriptionService = $subscriptionService;
    }

    public function index(){
        $listCategories = $this->categorieService->getCategoriesList();
        $listMessagesNotification = $this->subscriptionService->getListMessageNotification();
        return view('home', compact('listCategories', 'listMessagesNotification'));
    }
}
