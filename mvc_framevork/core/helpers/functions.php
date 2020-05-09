<?php

/**
*здесь собраны хелперы, которые помогают реализовывать коротку запись
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

function route()
{
    return app()->bildClass('Route');
}

function collect(array $data = [])
{
    return app()->bildClass('Collection', $data);
}