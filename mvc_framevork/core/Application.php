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
        /**
         * метод get() определен в репозитории 
         **/
        app()->onlyLoadClass(config()->get('app.required'));

        //Array ( [0] => Mvcframevork\Core\collection\Collection )
 
        // загружаем алиасы
        $this->loadAliases();
 
        // запускаем роуты BaseRoute
        require '../app/routes/web.php';
        (new \Route)->startRoute();
    }
 
    /**
     * Загрузка алиассов
     */
    private function loadAliases(): void
    {
        // Алиасы для классов
        foreach (config()->get('app.aliases') as $k => $v) {
            app()->set($k, $v)->createAlias($k, $k);
        }
    }
}