<?php

namespace Patterns\FactoryMethod;


/**
 * Интерфейс Продукта объявляет операции, которые должны выполнять все
 * конкретные продукты.
 */

interface ProductInterface
{
    public function operation(): string;
}