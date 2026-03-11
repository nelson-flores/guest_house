<?php
namespace App\Services\payment;

use stdClass;

/** @author Nelson Flores | nelson.flores@live.com */

interface IPaymentService
{

    // Métodos de processamento e saque
    /**
     * Processa o pagamento.
     * @throws \Exception
     * @return IPaymentService
     */
    public function processPayment();
    /**
     * Realiza a operação de saque.
     * @throws \Exception
     * @return self
     */
    public function withdrawTo();

    // Métodos de configuração de pagamento
    /**
     * Define o valor do pagamento.
     * @param mixed $amount
     * @return self
     */
    public function setAmount($amount);
    /**
     * Retorna o valor do pagamento.
     * @return mixed
     */
    public function getAmount();
    /**
     * Define a moeda do pagamento.
     * @return self
     */
    public function setCurrency($currency);
    /**
     * Retorna a moeda do pagamento.
     * @return mixed
     */
    public function getCurrency();
    /**
     * Define a descrição do pagamento.
     * @param mixed $description
     * @return self
     */
    public function setDescription($description);
    /**
     * Retorna a descrição do pagamento.
     * @return mixed
     */
    public function getDescription();
    /**
     * Define a URL de pagamento.
     * @param mixed $payment_url
     * @return self
     */
    public function setPaymentUrl($payment_url);
    /**
     * Retorna a URL de pagamento.
     * @return mixed
     */
    public function getPaymentUrl();
    /**
     * Define se o pagamento foi bem-sucedido.
     * @param bool $succeeded
     * @return self
     */
    public function setSucceeded($succeeded = false);
    /**
     * Retorna se o pagamento foi bem-sucedido.
     * @return bool
     */
    public function getSucceeded();
    /**
     * Define a URL de cancelamento do pagamento.
     * @param mixed $cancelUrl
     * @return self
     */
    public function setCancelUrl($cancel_url);
    /**
     * Retorna a URL de cancelamento do pagamento.
     * @return mixed
     */
    public function getCancelUrl();
    /**
     * Define a URL de retorno após o pagamento.
     * @param mixed $return_url
     * @return self
     */
    public function setReturnUrl($return_url);
    /**
     * Retorna a URL de retorno após o pagamento.
     * @return mixed
     */
    public function getReturnUrl();
    /**
     * Define os payloads do pagamento.
     * @param mixed $payloads
     * @return self
     */
    public function setPayloads(array $payloads);
    /**
     * Retorna os payloads do pagamento.
     * @return mixed
     */
    public function getPayloads();
    /**
     * Define a URL da API de pagamento.
     * @param mixed $api_url
     * @return self
     */
    public function setApi_url(string $api_url);
    /**
     * Retorna a URL da API de pagamento.
     * @return mixed
     */
    public function getApi_url();
    /**
     * Define a referência do pagamento.
     * @param mixed $reference
     * @return self
     */
    public function setReference($reference);
    /**
     * Retorna a referência do pagamento.
     * @return mixed
     */
    public function getReference();
    /**
     * Define a sub-entidade do pagamento.
     * @param mixed $sub_entity
     * @return self
     */
    public function setSub_entity($sub_entity);
    /**
     * Retorna a sub-entidade do pagamento.
     * @return mixed
     */
    public function getSub_entity();
    /**
     * Define o número de dias para expiração do pagamento.
     * @param mixed $expire
     * @return self
     */
    public function setExpireDays($expireDays);
    /**
     * Retorna o número de dias para expiração do pagamento.
     * @return mixed
     */
    public function getExpireDays();
    /**
     * Define a data de expiração do pagamento.
     * @param mixed $expire_date
     * @return self
     */
    public function setExpireDate($expire_date);
    /**
     * Retorna a data de expiração do pagamento.
     * @return mixed
     */
    public function getExpireDate();
    /**
     * Define a data do pagamento.
     * @param mixed $payment_date
     * @return self
     */
    public function setPaymentDate($payment_date);
    /**
     * Retorna a data do pagamento.
     * @return mixed
     */
    public function getPaymentDate();
    /**
     * Define o valor do brCode.
     * @param mixed $brCode
     * @return self
     */
    public function setBrCode($brCode);
    /**
     * Retorna o valor do brCode.
     */
    public function getBrCode();
    /**
     * Define a imagem do QR Code.
     * @param mixed $qrCodeImage
     * @return self
     */
    public function setQrCodeImage($qrCodeImage);
    /**
     * Retorna a imagem do QR Code.
     */
    public function getQrCodeImage();

    // Métodos de cartão
    /**
     * Define o código do cartão.
     * @param mixed $card_code
     * @return self
     */
    public function setCard_code($card_code);
    /**
     * Retorna o código do cartão.
     * @return mixed
     */
    public function getCard_code();
    /**
     * Define o nome do titular do cartão.
     * @param mixed $card_name
     * @return self
     */
    public function setCard_name($card_name);
    /**
     * Retorna o nome do titular do cartão.
     * @return mixed
     */
    public function getCard_name();
    /**
     * Define o CVV do cartão.
     * @param mixed $card_cvv
     * @return self
     */
    public function setCard_cvv($card_cvv);
    /**
     * Retorna o CVV do cartão.
     * @return mixed
     */
    public function getCard_cvv();

    // Métodos de cliente
    /**
     * Define o endereço do cliente.
     * @return  self
     */
    public function setCustomer_address($customer_address);
    /**
     * Retorna o endereço do cliente.
     */
    public function getCustomer_address();
    /**
     * Define o nome do cliente.
     * @return  self
     */
    public function setCustomer_name($customer_name);
    /**
     * Retorna o nome do cliente.
     */
    public function getCustomer_name();
    /**
     * Define o número de telefone do cliente.
     * @return  self
     */
    public function setPhone_number($phone_number);
    /**
     * Retorna o número de telefone do cliente.
     */
    public function getPhone_number();
    /**
     * Define o e-mail do cliente.
     * @return  self
     */
    public function setCustomer_email($customer_email);
    /**
     * Retorna o e-mail do cliente.
     */
    public function getCustomer_email();
    /**
     * Define o valor do api_id.
     * @return  self
     */
    public function setApi_id($api_id);
    /**
     * Retorna o valor do api_id.
     */
    public function getApi_id();

    // Métodos de status e resposta
    /**
     * Retorna a resposta da operação de pagamento ou saque.
     * @return mixed
     */
    public function getResponse();
    /**
     * Retorna informações do pagamento.
     * @return stdClass
     */
    function getPaymentInfo();
    /**
     * Verifica o status do pagamento.
     * @return stdClass
     */
    function checkPaymentStatus();
    /**
     * Retorna o status do pagamento.
     * @return mixed
     */
    function getPayment_status();
    /**
     * Retorna o status do saque.
     * @return mixed
     */
    function getWithdrawalStatus();
    /**
     * Retorna o ID do pagamento.
     * @return mixed
     */
    function getPaymentId();
    /**
     * Verifica se o pagamento está expirado.
     * @return  bool
     */
    public function isExpired();
}
