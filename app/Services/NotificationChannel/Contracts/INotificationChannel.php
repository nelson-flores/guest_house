<?php
namespace App\Services\NotificationChannel\Contracts;

/** @author Nelson Flores | nelson.flores@live.com */

interface INotificationChannel
{
    /**
     * Define o corpo da notificação.
     * @param string $body O conteúdo da mensagem a ser enviada.
     * @throws \Exception
     * @return self
     */
    public function setBody(string $body);
    /**
     * Adiciona um destinatário à notificação.
     * @param string $recipient O destinatário a ser adicionado.
     * @throws \Exception
     * @return self
     */
    public function addRecipient(string $recipient);
    /**
     * Adiciona múltiplos destinatários à notificação.
     * @param array $recipients Lista de destinatários a serem adicionados.
     * @throws \Exception
     * @return self
     */
    public function addRecipients(array $recipients);  
    /**
     * Define um único destinatário para a notificação (substitui os anteriores).
     * @param string $recipient O destinatário a ser definido.
     * @throws \Exception
     * @return self
     */
    public function setRecipient(string $recipient);
    /**
     * Define um único destinatário para a notificação (substitui os anteriores).
     * @param string $subject O assunto a ser definido.
     * @throws \Exception
     * @return self
     */
    public function setTitle(string $subject);
    /**
     * Define múltiplos destinatários para a notificação (substitui os anteriores).
     * @param array $recipients Lista de destinatários a serem definidos.
     * @throws \Exception
     * @return self
     */
    public function setRecipients(array $recipients);  
    /**
     * Envia a notificação para os destinatários definidos.
     * @throws \Exception
     * @return self
     */ 
    public function send();
}
