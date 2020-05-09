<?php
 
 namespace Mvcframevork\Core\container;
 
/**
 * Реализация синглтона
 */

class ServiceContainer
{
    /**
     * @var array
     *
     * все классы
     */
    protected $bindings = [];
    
    /**
     * @var object
     */
    private static $instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }
 
    /**
     * @return ServiceContainer
     * 
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
 
        return static::$instance;
    }
 
    /**
     * @param string $key
     * @param        $object
     *
     * @return $this|void
     * Метод для добавления нового класса
     */

    public function set(string $key, $object)
    {
       
        $this->bindings[$key] = compact('object');
        // compact Создает массив, содержащий названия переменных и их значения
  
        return $this; 
        //возращаем типа такого { ["object"]=>"mvc_framevork\core\config\Repository" }
    }
    
    /**
     * @param string $key
     * @param string $alias
     *
     * @return mixed
     * @throws \Exception
     */

    public function createAlias(string $key, string $alias)
    {
        if ( ! array_key_exists($key, $this->bindings)) {
            throw new ContainerException('First you must be use set function');
        }
 
        if ( ! class_exists($this->bindings[$key]['object'])) {
            throw new ContainerException('Incorrect name of class');
        }
 
        return class_alias($this->bindings[$key]['object'], $alias);
    }
 
    /**
     * @param string $key
     *
     * @param null   $params
     *
     * @return mixed
     * @throws ContainerException
     * 
     * Возвращаем объект класса по названию
     */
    public function bildClass(string $key, $params = null)
    {
       
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception('Incorrect key...');
        }
        
        return $this->instance($this->bindings[$key]['object'], $params);
    }
 
    /**
     * @param array $classes
     *
     * @return mixed
     */
    public function onlyLoadClass(array $classes)
    {
        foreach ($classes as $k) {
            $name = explode('\\', $k);
            $this->set(end($name), $k)->instance($k);
        }
    }
 
    /**
     * @param      $key
     * @param null $parameters
     *
     * @return mixed
     * Занимается созданием объектов
     * использует класс из стандартной библиотеки пхп 
     * ReflectionClass сообщает информацию о классе
     * 
     */

    private function instance($key, $parameters = null)
    {
        if ($key instanceof \Closure) {
            return call_user_func_array($key, $parameters);
        }
 
        if ( ! class_exists($key)) {
            return false;
        }
 
        if ('\\' != substr($key, 0, 1)) {
            mb_internal_encoding("UTF-8");
            $key = '\\'.$key;
        }
 
        if ( ! is_null($parameters)) {
           /*ReflectionClass принимает имя класса, 
           информацию которого необходимо получить в дальнейшем*/

            $reflection = new \ReflectionClass($key);

            /*newInstanceArgs — Создаёт экземпляр класса с переданными параметрами*/ 
            return $reflection->newInstanceArgs($parameters);
        } else {
            return new $key;
        }
    }
}