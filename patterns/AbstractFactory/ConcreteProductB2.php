<?php
namespace Patterns\AbstractFactory;


use Patterns\AbstractFactory\AbstractProductAInterface;
use Patterns\AbstractFactory\AbstractProductBInterface;
class ConcreteProductB2 implements AbstractProductBInterface
{
    public function usefulFunctionB(): string
    {
        return "The result of the product B2.";
    }

    /**
     * Продукт B2 может корректно работать только с Продуктом A2. Тем не менее,
     * он принимает любой экземпляр Абстрактного Продукта А в качестве
     * аргумента.
     */
    public function anotherUsefulFunctionB(AbstractProductAInterface $collaborator): string
    {
        $result = $collaborator->usefulFunctionA();

        return "The result of the B2 collaborating with the ({$result})";
    }
}