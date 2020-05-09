<?php
 
namespace Mvcframevork\Core;

class Application
{
    /**
     *
     */
    public function run(): void
    {
        
        // Загружаем классы в приложение из app
        //Тут app.aliases витягнемо aliasesмасив з app/config/app.phpфайлу
        //здесь app.required укажет на app.php файл а required укажет на масив 
        //в этом app.php файле
        
        app()->onlyLoadClass(config()->get('app.required'));
 
        // загружаем алиасы
        $this->loadAliases();
 
        // запускаем роуты
        require '../app/routers/main.php';
        (new \Route)->startRoute();
    }
 
    /**
     * Загрузка алиассов
     */
    private function loadAliases(): void
    {
        foreach (config()->get('app.aliases') as $k => $v) {
            app()->set($k, $v)->createAlias($k, $k);
        }
    }
}