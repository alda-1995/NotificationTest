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

    /**
     * The function sends notification messages to users based on the provided request and handles
     * exceptions by redirecting with success or error messages.
     * 
     * @param NotificationMessageRequest notificationMessageRequest The `SendNotificationMessages`
     * function takes a `NotificationMessageRequest` object as a parameter. This object likely contains
     * information needed to send notification messages to users, such as the category name and the
     * message content.
     * 
     * @return a redirect response. If the notification message is sent successfully, it will redirect
     * to the home route with a success message "Se notifico correctamente a los usuarios." If an
     * exception occurs during the process, it will redirect to the home route with an error message
     * containing the exception message.
     */
    public function SendNotificationMessages(NotificationMessageRequest $notificationMessageRequest){
        try {
            $this->subscriptionService->sendNotificationMessageUsers($notificationMessageRequest->categorie_name, $notificationMessageRequest->message);
            return redirect()->route("/")->with('success', "Se notifico correctamente a los usuarios.");
        } catch (Exception $e) {
            return redirect()->route("/")->with('error', $e->getMessage());
        }
    }
}
