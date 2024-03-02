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

   /**
    * The index function retrieves a list of categories and notification messages to be displayed on
    * the home view.
    * 
    * @return The `index` function is returning a view called 'home' with the variables
    * `` and `` passed to it using the `compact` function.
    */
    public function index()
    {
        $listCategories = $this->categorieService->getCategoriesList();
        $listMessagesNotification = $this->subscriptionService->getListMessageNotification();
        return view('home', compact('listCategories', 'listMessagesNotification'));
    }
}
