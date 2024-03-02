<?php

namespace App\Services;

use App\DTO\NotificationMessageDto;
use App\Repositories\SubscriptionRepository;
use App\Repositories\UserRepository;
use Exception;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class SubscriptionService
{
    protected $subscriptionRepository;
    protected $userRepository;
    
    public function __construct(SubscriptionRepository $subscriptionRepository, UserRepository $userRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->userRepository = $userRepository;
    }

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
            throw new Exception("Se genero un error al consultar los mensajes.", $e->getMessage());
        }
    }
}
