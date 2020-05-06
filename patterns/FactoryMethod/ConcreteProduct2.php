<?php

namespace Patterns\FactoryMethod;




/**
 * Конкретные Продукты предоставляют различные реализации интерфейса Продукта.
 */

class ConcreteProduct2 implements ProductInterface
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct2}";
    }
}