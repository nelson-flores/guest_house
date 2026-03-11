<?php
namespace App\Services\payment;

use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

use stdClass;
use Flores;


/** @author Nelson Flores | nelson.flores@live.com */

abstract class PaymentServiceImpl implements IPaymentService
{
    protected $order_id;
    protected $payment_id = null;
    protected $payment_url;
    protected $payment_date;
    protected $payment_status;
    protected $amount;
    protected $api_url;
    protected $brCode;
    protected $qrCodeImage;
    protected $payloads;
    protected $response;
    protected $currency = "USD";
    protected $phone_number;
    protected $customer_email;
    protected $customer_name;
    protected $customer_address;


    private $api_id;

    protected $entity;
    protected $sub_entity;
    protected $reference;
    protected $expire_days;
    protected $expire_date;

    #FOR CREDIT CARDS

    protected $card_code;
    protected $card_name;
    protected $card_cvv;

    #/. FOR CREDIT CARDS

    protected $description;

    protected $cancel_url;
    protected $return_url;

    /**
     * @var bool
     */
    protected $succeeded = false;
    /**
     * @var bool
     */
    protected $expired = false;
    abstract function checkPaymentStatus();
    abstract function getWithdrawalStatus();

    public function __construct($amount = null, $order_id = null)
    {
        $this->amount = $amount;
        $this->order_id = $order_id;
        $this->setExpired(false);

        ini_set('max_execution_time', 18000);
    }



    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
        return $this;
    }
    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function setPaymentId($payment_id)
    {
        $this->payment_id = $payment_id;
        return $this;
    }

    public function setResponse($response, $status = -1)
    {
        $this->response = $response;
        $this->payment_status = $status;
        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }


    public function getPaymentInfo()
    {
        $arr = [
            'order_id' => $this->order_id,
            'payment_status' => $this->payment_status,
            'amount' => $this->amount,
            'entity' => $this->entity,
            'reference' => $this->reference,
            'payment_id' => $this->payment_id,
            'succeeded' => $this->succeeded,
            'expired' => $this->expired,
            'request_payloads' => $this->getPayloads(),
            'response' => $this->getResponse()
        ];

        return json_decode(json_encode($arr));
    }


    abstract public function processPayment();
    abstract public function withdrawTo();

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return (double) doubleval(trim($this->amount) ?? 0);
    }

    /**
     * @param mixed $amount
     * @return self
     */
    public function setAmount($amount): self
    {
        $this->amount = (double) trim($amount) ?? 0;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return strtoupper($this->currency);
    }

    /**
     * @param mixed $currency
     * @return self
     */
    public function setPaymentUrl($payment_url): self
    {
        $this->payment_url = $payment_url;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPaymentUrl()
    {
        return $this->payment_url;
    }

    /**
     * @param mixed $currency
     * @return self
     */
    public function setCurrency($currency): self
    {
        $this->currency = strtoupper($currency);
        return $this;
    }

    /**
     *
     * @return bool
     */
    public function getSucceeded()
    {
        return $this->succeeded;
    }
    /**
     *
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }

    /**
     *
     * @param bool $succeeded
     * @return self
     */
    public function setSucceeded($succeeded = false): self
    {
        $this->succeeded = $succeeded;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }

    /**
     * @param mixed $cancelUrl
     * @return self
     */
    public function setCancelUrl($cancel_url): self
    {
        $this->cancel_url = $cancel_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->return_url;
    }

    /**
     * @param mixed $return_url
     * @return self
     */
    public function setReturnUrl($return_url): self
    {
        $this->return_url = $return_url;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCard_code()
    {
        return $this->card_code;
    }

    /**
     * @param mixed $card_code
     * @return self
     */
    public function setCard_code($card_code): self
    {
        $this->card_code = $card_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCard_name()
    {
        return $this->card_name;
    }

    /**
     * @param mixed $card_name
     * @return self
     */
    public function setCard_name($card_name): self
    {
        $this->card_name = $card_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCard_cvv()
    {
        return $this->card_cvv;
    }

    /**
     * @param mixed $card_cvv
     * @return self
     */
    public function setCard_cvv($card_cvv): self
    {
        $this->card_cvv = $card_cvv;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPayloads()
    {
        return $this->payloads;
    }

    /**
     * @param mixed $payloads
     * @return self
     */
    public function setPayloads(array $payloads): self
    {
        $this->payloads = $payloads;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getApi_url()
    {
        return $this->api_url;
    }

    /**
     * @param mixed $api_url
     * @return self
     */
    public function setApi_url(string $api_url): self
    {
        $this->api_url = $api_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return self
     */
    public function setReference($reference): self
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSub_entity()
    {
        return $this->sub_entity;
    }

    /**
     * @param mixed $sub_entity
     * @return self
     */
    public function setSub_entity($sub_entity): self
    {
        $this->sub_entity = $sub_entity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpireDays()
    {
        return $this->expire_days;
    }

    /**
     * @param mixed $expire
     * @return self
     */
    public function setExpireDays($expireDays): self
    {
        $this->expire_days = $expireDays;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpireDate()
    {
        return $this->expire_date;
    }

    /**
     * @param mixed $expire_date
     * @return self
     */
    public function setExpireDate($expire_date): self
    {
        $this->expire_date = $expire_date;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->payment_date;
    }

    /**
     * @param mixed $payment_date
     * @return self
     */
    public function setPaymentDate($payment_date): self
    {
        $this->payment_date = $payment_date;
        return $this;
    }

    /**
     * Get the value of customer_name
     */
    public function getCustomer_name()
    {
        return $this->customer_name ?? "";
    }

    /**
     * Set the value of customer_name
     *
     * @return  self
     */
    public function setCustomer_name($customer_name)
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    /**
     * Get the value of phone_number
     */
    public function getPhone_number()
    {
        return $this->phone_number ?? "";
    }

    /**
     * Set the value of phone_number
     *
     * @return  self
     */
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Get the value of customer_email
     */
    public function getCustomer_email()
    {
        return $this->customer_email ?? "";
    }

    /**
     * Set the value of customer_email
     *
     * @return  self
     */
    public function setCustomer_email($customer_email)
    {
        $this->customer_email = $customer_email;

        return $this;
    }

    /**
     * Get the value of api_id
     */
    public function getApi_id()
    {
        return $this->api_id;
    }

    /**
     * Set the value of api_id
     *
     * @return  self
     */
    public function setApi_id($api_id)
    {
        $this->api_id = $api_id;

        return $this;
    }

    /**
     * Get the value of payment_status
     */
    public function getPayment_status()
    {
        return $this->payment_status;
    }

    /**
     * Set the value of payment_status
     *
     * @return  self
     */
    public function setPayment_status($payment_status)
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    /**
     * Get the value of expired
     *
     * @return  bool
     */
    public function isExpired()
    {
        return $this->expired;
    }

    /**
     * Set the value of expired
     *
     * @param  bool  $expired
     *
     * @return  self
     */
    public function setExpired(bool $expired = true)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get the value of customer_address
     */
    public function getCustomer_address()
    {
        return $this->customer_address;
    }

    /**
     * Set the value of customer_address
     *
     * @return  self
     */
    public function setCustomer_address($customer_address)
    {
        $this->customer_address = $customer_address;

        return $this;
    }





    /**
     * Get the value of brCode
     */
    public function getBrCode()
    {
        return $this->brCode;
    }

    /**
     * Set the value of brCode
     *
     * @return  self
     */
    public function setBrCode($brCode)
    {
        $this->brCode = $brCode;

        return $this;
    }

    /**
     * Get the value of qrCodeImage
     */
    public function getQrCodeImage()
    {
        return $this->qrCodeImage;
    }

    /**
     * Set the value of qrCodeImage
     *
     * @return  self
     */
    public function setQrCodeImage($qrCodeImage)
    {
        $this->qrCodeImage = $qrCodeImage;

        return $this;
    }


    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
