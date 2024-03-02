<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function getUsersByCategoriaSubscription(string $categoriaId)
    {
        $queryUsersByCategoria = User::join('subscriptions', 'users.user_id', 'subscriptions.user_id_foreign')
        ->where("subscriptions.category_id_foreign", $categoriaId)
        ->select('subscriptions.subscription_id')->get();
        return $queryUsersByCategoria;
    }
}
