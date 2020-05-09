<?php

/**
*здесь собраны хелперы, которые помогают реализовывать короткую запись
*/

/**
*app() возращает обьект сервис контейнера
*/

function app()
{
    //получаем объект ServiceContainer
    return \Mvcframevork\Core\container\ServiceContainer::getInstance();
}

function config()
{  
    
    return app()
        ->set('config', '\Mvcframevork\Core\config\Repository')
        ->bildClass('config');
}
/**
 * bildClass(Возвращаем объект класса по названию
 * определен метод ServiceContainer
*/

function route()
{
    return app()->bildClass('Route');
}

function collect(array $data = [])
{
    /*
    *  $reflection = new \ReflectionClass($key);
    *  $data передается в рефлексию как параиетр
    *  return $reflection->newInstanceArgs($parameters);
    */
    return app()->bildClass('Collection', $data);
}