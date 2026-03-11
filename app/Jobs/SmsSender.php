<?php
namespace App\Jobs;

use App\Services\NotificationChannel\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ParseError;


class SmsSender implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $recipients = [];
    private $body;


    public function __construct($recipients, $body)
    {
        $this->recipients = $recipients;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new SmsService())
            ->sync()
            ->setRecipients($this->recipients)
            ->setBody($this->body)
            ->send();
    }
}
