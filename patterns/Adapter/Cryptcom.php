<?php

namespace Patterns\Adapter;



class Cryptcom {
     
    public function __construct() {
       
    }
     
    public function sendPaymentCryptcom($amount) {
       
        echo "Оплата через Cryptcom: ". $amount;
    }
}