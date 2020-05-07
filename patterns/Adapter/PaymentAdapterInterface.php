<?php

namespace Patterns\Adapter;

/**
 * интерфейс, с которым может работать клиентский код.
 */
// Simple Interface for each Adapter we create

interface PaymentAdapterInterface {
    public function pay($amount);
}