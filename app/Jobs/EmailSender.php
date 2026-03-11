<?php
namespace App\Jobs;

use App\Services\NotificationChannel\EmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ParseError;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;


class EmailSender implements ShouldQueue
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
    private $attachs = [];
    private $subject;
    private $body;

    public function __construct($recipients, $subject, $body, $attachs = [])
    {
        $this->recipients = $recipients;
        $this->subject = $subject;
        $this->body = $body;
        $this->attachs = $attachs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new EmailService($this->subject))
            ->sync()
            ->setBody($this->body)
            ->setRecipients($this->recipients)
            ->send()
        ;
    }
}
