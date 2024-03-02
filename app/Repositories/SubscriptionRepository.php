<?php

namespace App\Repositories;
use App\DTO\NotificationMessageDto;
use App\Interfaces\SubscriptionInterface;
use App\Models\NotificationMessage;
use Carbon\Carbon;

class SubscriptionRepository implements SubscriptionInterface
{
    /**
     * The function creates a new message notification using the provided data and saves it to the
     * database.
     * 
     * @param NotificationMessageDto notificationMessageDto The `createMessageNotification` function
     * takes a parameter of type `NotificationMessageDto` named ``. This
     * parameter is an object that contains the following properties:
     */
    public function createMessageNotification(NotificationMessageDto $notificationMessageDto){
        $dateNow = Carbon::now();
        $formattedDate = $dateNow->format('d/m/Y H:i:s');
        $newNotification = new NotificationMessage();
        $newNotification->message = $notificationMessageDto->message;
        $newNotification->subscription_id_foreign = $notificationMessageDto->subscriptionId;
        $newNotification->created_at = $formattedDate;
        $newNotification->save();
    }

   /**
    * This PHP function retrieves the latest 100 notification messages along with associated channel
    * and user information.
    * 
    * @return The `getHistoryMessageNotificacion` function is returning a list of notification messages
    * along with the channel name and user name associated with each message. The messages are ordered
    * by their creation date in descending order and the function is limiting the result to 100
    * messages.
    */
    public function getHistoryMessageNotificacion()
    {
        $listMessages = NotificationMessage::join("subscriptions", 'notification_messages.subscription_id_foreign', 'subscriptions.subscription_id')
        ->join("channels", 'subscriptions.channel_id_foreign', 'channels.channel_id')
        ->join("users", 'subscriptions.user_id_foreign', 'users.user_id')
        ->select("notification_messages.message", "notification_messages.created_at",
        'channels.name as name_channel', 'users.name as name_user')
        ->orderBy("notification_messages.created_at", 'desc')
        ->limit(100)
        ->get();
        return $listMessages;
    }
}