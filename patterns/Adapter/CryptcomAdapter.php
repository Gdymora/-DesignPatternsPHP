<?php

namespace Patterns\Adapter;


class CryptcomAdapter implements PaymentAdapterInterface 
{
    private $cryptcom;
 
    public function __construct(Cryptcom $cryptcom) {
        $this->cryptcom = $cryptcom;
    }
     
    public function pay($amount) {
        $this->cryptcom->sendPaymentCryptcom($amount);
    }

  
}