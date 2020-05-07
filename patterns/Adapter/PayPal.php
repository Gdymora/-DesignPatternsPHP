<?php

namespace Patterns\Adapter;



class PayPal {
     
    public function __construct() {
       
    }
     
    public function sendPaymentPaypel($amount) {
       
        echo "Оплата через PayPal: ". $amount;
    }
}