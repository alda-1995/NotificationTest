<?php

namespace App\Interfaces;

use App\DTO\NotificationMessageDto;

interface SubscriptionInterface
{
    public function createMessageNotification(NotificationMessageDto $notificationMessageDto);

    public function getHistoryMessageNotificacion();
}
