<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationMessageRequest;
use App\Services\SubscriptionService;
use Exception;

class NotificationMessageController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function SendNotificationMessages(NotificationMessageRequest $notificationMessageRequest){
        try {
            $this->subscriptionService->sendNotificationMessageUsers($notificationMessageRequest->categorie_name, $notificationMessageRequest->message);
            return redirect()->route("/")->with('success', "Se notifico correctamente a los usuarios.");
        } catch (Exception $e) {
            return redirect()->route("/")->with('error', $e->getMessage());
        }
    }
}
