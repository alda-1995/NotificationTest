<?php

namespace App\Services;

use App\DTO\NotificationMessageDto;
use App\Repositories\SubscriptionRepository;
use App\Repositories\UserRepository;
use Exception;

class SubscriptionService
{
    protected $subscriptionRepository;
    protected $userRepository;
    
    public function __construct(SubscriptionRepository $subscriptionRepository, UserRepository $userRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * This PHP function sends a notification message to users subscribed to a specific category.
     * 
     * @param string categoriaId The `categoriaId` parameter in the `sendNotificationMessageUsers`
     * function is a string that represents the category ID for which you want to send a notification
     * message to users who are subscribed to that category.
     * @param string message The `sendNotificationMessageUsers` function takes in a `categoriaId` and a
     * `message` as parameters. The `message` parameter is the notification message that you want to
     * send to users who are subscribed to a specific category identified by the `categoriaId`.
     * 
     * @return The function `sendNotificationMessageUsers` will return a boolean value - `true` if the
     * notification messages were successfully sent to users based on their subscriptions, and `false`
     * if there were no user subscriptions found for the given category. If an exception is caught
     * during the process, it will throw a new Exception with the message "Se genero un error al
     * intentar notificar a los suscript
     */
    public function sendNotificationMessageUsers(string $categoriaId, string $message){
        try{
            $userSubscriptions = $this->userRepository->getUsersByCategoriaSubscription($categoriaId);
            if(empty($userSubscriptions)){
                return false;
            }
            foreach($userSubscriptions as $userSub){
                $newNotification = new NotificationMessageDto($message, $userSub->subscription_id);
                $this->subscriptionRepository->createMessageNotification($newNotification);
            }
            return true;
        }catch(Exception $e){
            throw new Exception("Se genero un error al intentar notificar a los suscriptores.");
        }
    }

    public function getListMessageNotification(){
        try{
            $usersNotificationMessage = $this->subscriptionRepository->getHistoryMessageNotificacion();
            return $usersNotificationMessage;
        }catch(Exception $e){
            throw new Exception("Se genero un error al consultar los mensajes.");
        }
    }
}
