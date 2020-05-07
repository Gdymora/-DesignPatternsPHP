<?php
namespace Patterns\AbstractFactory;

use Patterns\AbstractFactory\AbstractProductAInterface;

/**
 * Конкретные продукты создаются соответствующими Конкретными Фабриками.
 */
class ConcreteProductA2 implements AbstractProductAInterface
{
    public function usefulFunctionA(): string
    {
        return "The result of the product A1.";
    }
}