<?php



Route::get('mvc_framevork/public/', function() {
    echo 'Моя Главная страница';
});

Route::get('mvc_framevork/public/index', function() {
    echo 'Моя Index страница';
});

//Route::get('mvc_framevork/public/index', 'app\controllers\IndexController@Index');