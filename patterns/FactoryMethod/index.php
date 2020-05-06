<?php

include "../../vendor/autoload.php";

use Patterns\FactoryMethod\CreatorAbstract;
use Patterns\FactoryMethod\ConcreteCreator1;
use Patterns\FactoryMethod\ConcreteCreator2;

/**
 * Клиентский код работает с экземпляром конкретного создателя, хотя и через его
 * базовый интерфейс. Пока клиент продолжает работать с создателем через базовый
 * интерфейс, вы можете передать ему любой подкласс создателя.
 */

function clientCode(CreatorAbstract $creator)
{
    // ...
    echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->someOperation();
    // ...
}

/**
 * Приложение выбирает тип создателя в зависимости от конфигурации или среды.
 */
echo "App: Launched with the ConcreteCreator1.\n";
clientCode(new ConcreteCreator1);
echo "\n\n";

echo "App: Launched with the ConcreteCreator2.\n";
clientCode(new ConcreteCreator2);

echo "<pre> Фабричный метод — это порождающий паттерн проектирования, который решает проблему 
создания различных продуктов, без указания конкретных классов продуктов.
Фабричный метод задаёт метод, который следует использовать вместо вызова 
оператора new для создания объектов-продуктов. Подклассы могут переопределить 
этот метод, чтобы изменять тип создаваемых продуктов.
</pre>";

echo "В простых случаях, этот абстрактный класс может быть только интерфейсом.

<pre> abstract class Product
{} 
class ProductA extends Product
{}
class ProductB extends Product
{}
abstract class FactoryAbstract
{
public function create(\$type)
{switch (\$type) {
case'A':
return new ProductA();
case'B':
default:
return new ProductB();
}
}
}
class Factory extends FactoryAbstract
{
}
\$factory = new Factory();
\$productA = \$factory->create('A');
</pre> ";

echo "<pre>". 'Паттерн Фабричный метод  — это устройство классов, при котором подклассы могут переопределять тип создаваемого в суперклассе продукта.

Если вы имеете иерархию продуктов и абстрактный создающий метод, который переопределяется в подклассах, то перед вами паттерн Фабричный метод.

abstract class Department {
    public abstract function createEmployee($id);

    public function fire($id) {
        $employee = $this->createEmployee($id);
        $employee->paySalary();
        $employee->dismiss();
    }
}

class ITDepartment extends Department {
    public function createEmployee($id) {
        return new Programmer($id);
    }
}

class AccountingDepartment extends Department {
    public function createEmployee($id) {
        return new Accountant($id);
    }
}'."</pre>";