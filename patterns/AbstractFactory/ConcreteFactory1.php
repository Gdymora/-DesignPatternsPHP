<?php
namespace Patterns\AbstractFactory;

use Patterns\AbstractFactory\AbstractFactoryInterface;
use Patterns\AbstractFactory\AbstractProductAInterface;
use Patterns\AbstractFactory\AbstractProductBInterface;
use Patterns\AbstractFactory\ConcreteProductA1;
use Patterns\AbstractFactory\ConcreteProductB1;
/**
 * Конкретная Фабрика производит семейство продуктов одной вариации. Фабрика
 * гарантирует совместимость полученных продуктов. Обратите внимание, что
 * сигнатуры методов Конкретной Фабрики возвращают абстрактный продукт, в то
 * время как внутри метода создается экземпляр конкретного продукта.
 */
class ConcreteFactory1 implements AbstractFactoryInterface
{
    public function createProductA(): AbstractProductAInterface
    {
        return new ConcreteProductA1;
    }

    public function createProductB(): AbstractProductBInterface
    {
        return new ConcreteProductB1;
    }
}