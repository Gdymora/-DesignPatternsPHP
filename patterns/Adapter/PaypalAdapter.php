<?php
namespace Patterns\Adapter;

/**
 * Адаптер делает совместимым Класс Send1 в клиентском коду и если в Send1 ято то изменится 
 * то это затронет только этот класс
 * 
 */

class PaypalAdapter implements PaymentAdapterInterface {
     
    private $paypal;
 
    public function __construct(PayPal $paypal) {
        $this->paypal = $paypal;
    }
     
    public function pay($amount) {
        $this->paypal->sendPaymentPaypel($amount);
    }
}