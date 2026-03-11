<?php
namespace App\Services\payment\mpesa;

class B2C extends MpesaService
{
    public function processPayment()
    {

        $this->setSucceeded(false);

        $b2c = $this->getProvider()->b2c(
            $this->getAmount(),
            $this->getPhone_number(),
            'T12344C',
            $this->getOrder_id(),
        );
    }
}
