<?php
namespace Patterns\AbstractFactory;


use Patterns\AbstractFactory\AbstractProductAInterface;
use Patterns\AbstractFactory\AbstractProductBInterface;
/**
 * Конкретные Продукты создаются соответствующими Конкретными Фабриками.
 */
class ConcreteProductB1 implements AbstractProductBInterface
{
    public function usefulFunctionB(): string
    {
        return "The result of the product B1.";
    }

    /**
     * Продукт B1 может корректно работать только с Продуктом A1. Тем не менее,
     * он принимает любой экземпляр Абстрактного Продукта А в качестве
     * аргумента.
     */
    public function anotherUsefulFunctionB(AbstractProductAInterface $collaborator): string
    {
        $result = $collaborator->usefulFunctionA();

        return "The result of the B1 collaborating with the ({$result})";
    }
}
