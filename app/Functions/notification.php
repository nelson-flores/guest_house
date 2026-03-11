<?php

use App\Dto\NotificationTypeDTO;
use App\Models\User;
use App\Services\NotificationChannel\EmailService;
use App\Services\NotificationChannel\NotificationService;
use App\Services\NotificationChannel\SmsService;


/**
 * Simple way of sending notifications
 * @param User $user
 * @param mixed $title
 * @param mixed $message
 * @param mixed $attach
 * @param NotificationTypeDTO|null $notificationType
 * @return void
 */

function notify(User $user, $title, $message, $attach = null, ?NotificationTypeDTO $notificationType = null)
{
    $sms_enabled = $notificationType ? $notificationType->sms_enabled : true;
    $email_enabled = $notificationType ? $notificationType->email_enabled : true;
    $user_enabled = $notificationType ? $notificationType->user_enabled : true;


    if ($user_enabled) {
        $notification_service = new NotificationService($title);
        $notification_service->setRecipient($user->id)->setBody($notificationType->user_message ?? $message)->send();
    }

    if ($email_enabled) {

        $email_body = $notificationType->email_message ?? $message;

        if (!$notificationType->is_templated_email) {
            $email_body = view('email.notification', [
                'title' => $title,
                'message' => $notificationType->email_message ?? $message
            ])->render();
        }

        $email_service = new EmailService($title);
        $email_service->setRecipient($user->email)->setBody($email_body)->send();
    }

    if ($sms_enabled) {
        $sms_service = new SmsService();
        if ($user->phone = formatPhone($user->phone)) {
            $sms_service->setRecipient($user->phone)->setBody($notificationType->sms_message ?? $message)->send();
        }
    }


}

