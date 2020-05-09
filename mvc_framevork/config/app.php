<?php

use Mvcframevork\Core\collection\Collection;
use Mvcframevork\Core\routers\Router;

return [
    // Классы которые будут загружены при запуске приложения
    'required' => [
        Collection::class,
    ],

    // Алиасы для классов
    'aliases'  => [
        'Route' => Router::class,
    ]
];