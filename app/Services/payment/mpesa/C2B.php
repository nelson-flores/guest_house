<?php 
namespace App\Services\payment\mpesa;

class C2B extends MpesaService{
  
    public function processPayment()
    {
        $this->setSucceeded(false);

        $c2b = $this->getProvider()->c2b(
            $this->getAmount(),
            $this->getPhone_number(),
            'T12344C',
            $this->getOrder_id(),
        );

        try {
            $response  = $c2b->getResponse();
            $this->setResponse($response);

            $json = json_decode($response);
            switch (strtolower($json->output_ResponseCode)) {
                case 'ins-0':
                    $this->getPaymentId($json->output_TransactionID);
                    $this->setReference($json->output_ThirdPartyReference);
                    $this->setPayment_status($json->output_ResponseCode);
                    $this->setSucceeded(true);
                    break;
                default:
                    break;
            }

        } catch (\Exception $e) {
            throw new \App\Services\Payment\Exceptions\GeneralTransactionErrorException();
        }
        return $this;
        
    }
}