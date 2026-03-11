<?php

namespace App\Services\NotificationChannel;

use App\Services\NotificationChannel\Abstracts\NotificationChannelService;
use App\Models\Notification;

class NotificationService extends NotificationChannelService
{
    public function queue() {}

    public function __construct($subject = '')
    {
        $this->subject = $subject;
    }

    public function send()
    {
        $arr = [];
        foreach ($this->recipients as $user_id) {
            $arr = [
                'user_id' => $user_id,
                'title' => $this->subject,
                'message' => $this->body,
            ];
            Notification::insert($arr);
        }
        return $this;
    }
}
