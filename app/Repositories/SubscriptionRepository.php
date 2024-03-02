<?php

namespace App\Repositories;
use App\DTO\NotificationMessageDto;
use App\Interfaces\SubscriptionInterface;
use App\Models\NotificationMessage;
use Carbon\Carbon;

class SubscriptionRepository implements SubscriptionInterface
{
    public function createMessageNotification(NotificationMessageDto $notificationMessageDto){
        $dateNow = Carbon::now();
        $formattedDate = $dateNow->format('d/m/Y H:i:s');
        $newNotification = new NotificationMessage();
        $newNotification->message = $notificationMessageDto->message;
        $newNotification->subscription_id_foreign = $notificationMessageDto->subscriptionId;
        $newNotification->created_at = $formattedDate;
        $newNotification->save();
    }

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
