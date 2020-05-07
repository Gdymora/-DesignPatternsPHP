<?php

include "../../vendor/autoload.php";

use Patterns\Adapter\CryptcomAdapter;
use Patterns\Adapter\PaypalAdapter;
use Patterns\Adapter\PayPal;
use Patterns\Adapter\Cryptcom;
// клиентский код

$paypal = new PaypalAdapter(new PayPal());

$paypal->pay('2629');
echo "<br>";
$cryptcom = new CryptcomAdapter(new Cryptcom());

$cryptcom->pay('2629');
echo "<br>";echo "<br>";

echo "У шаблоні адаптера 
клас перетворює інтерфейс одного класу у такий, який очікує інший клас.
Адаптери корисні, якщо ви хочете використовувати клас, який не має точних 
потрібних вам методів, і ви не можете змінити початковий клас. Адаптер може 
приймати методи, до яких можна отримати доступ 
у вихідному класі, та адаптувати їх до потрібних методів.
";