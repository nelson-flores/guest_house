<?php

namespace App\Services\NotificationChannel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Jobs\EmailSender;
use App\Services\NotificationChannel\Abstracts\NotificationChannelService;
use Mpdf\Tag\Th;
use PHPMailer\PHPMailer\SMTP;


/** @author Nelson Flores | nelson.flores@live.com */

class EmailService extends NotificationChannelService
{

    public function __construct($subject = '')
    {
        try {

            $this->subject = $subject;

            $this->provider = new PHPMailer(true);

            #SMTP::DEBUG_OFF (0): Desativar o debug (você pode deixar sem preencher este valor, uma vez que esta opção é o padrão).
            #SMTP::DEBUG_CLIENT (1): Imprimir mensagens enviadas pelo cliente.
            #SMTP::DEBUG_SERVER (2): similar ao 1, mais respostas recebidas dadas pelo servidor (esta é a opção mais usual).
            #SMTP::DEBUG_CONNECTION (3): similar ao 2, mais informações sobre a conexão inicial - este nível pode auxiliar na ajuda com falhas STARTTLS.
            #SMTP::DEBUG_LOWLEVEL (4): similar ao 3, mais informações de baixo nível, muito prolixo, não use para debugar SMTP, apenas em problemas de baixo nível.

            $this->provider->SMTPDebug = SMTP::DEBUG_OFF;

            $this->provider->isSMTP();
            $this->provider->CharSet = 'UTF-8';
            $this->provider->Host = env("MAIL_HOST");
            $this->provider->Username = env("MAIL_USERNAME");
            $this->provider->Password = env("MAIL_PASSWORD");
            $this->provider->Port = env("MAIL_PORT");
            $this->provider->SMTPAuth = true;
            $this->provider->SMTPSecure = 'ssl'; //PHPMailer::ENCRYPTION_STARTTLS;

            //Recipients
            $this->provider->setFrom(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME'));
        } catch (\Throwable $e) {
        }

        //em   $this->provider->setFrom(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME'));

    }
    public function addattach($file_location, $name)
    {
        array_push($this->attachs, ['file' => $file_location, 'name' => $name]);

        return $this;
    }


    protected function queue()
    {
        $job = new EmailSender($this->recipients, $this->subject, $this->body);
        dispatch($job)->delay(now()->addSeconds(5));
    }

    public function send()
    {

        foreach ($this->recipients as $email) {
            $this->provider->addAddress($email);
        }

        foreach ($this->attachs as $attachment) {
            $this->provider->addAttachment($attachment['file'], $attachment['name']);
        }

        // Content
        $this->provider->isHTML(true);
        $this->provider->Subject = $this->subject;
        $this->provider->Body = $this->getBody();

        if ($this->async == true) {
            $this->queue();
        } else {
            $this->provider->send();
        }
        return $this;
    }
}
