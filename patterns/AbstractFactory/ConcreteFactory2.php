<?php
namespace Patterns\AbstractFactory;
use Patterns\AbstractFactory\AbstractFactoryInterface;
use Patterns\AbstractFactory\AbstractProductAInterface;
use Patterns\AbstractFactory\AbstractProductBInterface;
use Patterns\AbstractFactory\ConcreteProductA1;
use Patterns\AbstractFactory\ConcreteProductB1;

/**
 * Каждая Конкретная Фабрика имеет соответствующую вариацию продукта.
 */
class ConcreteFactory2 implements AbstractFactoryInterface
{
    public function createProductA(): AbstractProductAInterface
    {
        return new ConcreteProductA2;
    }

    public function createProductB(): AbstractProductBInterface
    {
        return new ConcreteProductB2;
    }
}