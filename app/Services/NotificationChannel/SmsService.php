<?php
namespace App\Services\NotificationChannel;

use App\Jobs\SmsSender;
use App\Services\NotificationChannel\Abstracts\NotificationChannelService;
use Twilio\Rest\Client;

/** @author Nelson Flores | nelson.flores@live.com */

class SmsService extends NotificationChannelService
{

    private $dashboard_sid;
    private $auth_token; 
    
    public function __construct()
    {
        $this->dashboard_sid = env('TWILIO_ID');
        $this->auth_token = env('TWILIO_AUTH_TOKEN');
        $this->setFrom(env('TWILIO_NUMBER'));
        $this->provider =  new Client($this->dashboard_sid, $this->auth_token);
    }

    protected function queue()
    {
        $job = new SmsSender($this->recipients,$this->body);
        dispatch($job)->delay(now()->addSeconds(5));
    }

    public function processMessages(){

        foreach ($this->recipients as $key => $number) {
            $this->provider->messages->create(
                $number,
                array(
                    'from' => $this->getFrom(),
                    'body' => $this->getBody(),
                )
            );
        }

    }

    public function send()
    {
        if ($this->async == true) {
             $this->queue();
        } else {
            $this->processMessages();
        }
        return $this;
    }

}
