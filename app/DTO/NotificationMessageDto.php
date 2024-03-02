<?php

namespace App\DTO;

class NotificationMessageDto
{
    public string $message;
    public string $subscriptionId;

    public function __construct(string $message, string $subscriptionId)
    {
        $this->message = $message;
        $this->subscriptionId = $subscriptionId;
    }
}
