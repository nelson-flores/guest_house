<?php

namespace App\Services\NotificationChannel\Abstracts;

use App\Services\NotificationChannel\Contracts\INotificationChannel;

/** @author Nelson Flores | nelson.flores@live.com */

abstract class NotificationChannelService implements INotificationChannel
{

    protected $provider;

    protected $async = true;

    protected $from = '';
    protected $recipients = [];
    protected $attachs = [];
    protected $body = '';
    protected $subject = '';

    abstract public function send();
    abstract protected function queue();

    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }
    public function getFrom()
    {
        return $this->from;
    }
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function sync()
    {
        $this->async = false;

        return $this;
    }

    public function getRecipients()
    {
        return $this->recipients;
    }

    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;

        return $this;
    }

    public function setRecipient($recipient)
    {
        $this->recipients = [$recipient];

        return $this;
    }


    public function addRecipient($recipient)
    {
        array_push($this->recipients, $recipient);

        return $this;
    }

    public function addRecipients($recipients)
    {
        array_merge($this->recipients, $recipients);

        return $this;
    }

    public function setTitle($subject)
    {
        $this->subject = $subject;
        return $this;
    }


    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }
}
