<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    /**
     * The function retrieves users based on a specified category subscription ID.
     * 
     * @param string categoriaId The function `getUsersByCategoriaSubscription` takes a `categoriaId`
     * as a parameter, which is a string representing the category ID for which you want to retrieve
     * users with subscriptions. The function then performs a database query to fetch users who have
     * subscriptions in the specified category.
     * 
     * @return The function `getUsersByCategoriaSubscription` is returning a collection of subscription
     * IDs for users who are subscribed to a specific category identified by the ``
     * parameter.
     */
    public function getUsersByCategoriaSubscription(string $categoriaId)
    {
        $queryUsersByCategoria = User::join('subscriptions', 'users.user_id', 'subscriptions.user_id_foreign')
        ->where("subscriptions.category_id_foreign", $categoriaId)
        ->select('subscriptions.subscription_id')->get();
        return $queryUsersByCategoria;
    }
}
