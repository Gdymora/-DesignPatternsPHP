<?php
 
namespace Mvcframevork\Core\routers;
 
use Mvcframevork\Core\routers\ParseUrl;
use Mvcframevork\Core\routers\RouteHelper;
 
class BaseRoute
{
    use ParseUrl, RouteHelper;
 
    /**
     * @var array
     *
     * Все роутеры
     */
    protected static $routers = [];
 
    /**
     * @var array
     */
    protected static $patterns = [
        '{integer}' => '[0-9]+',
        '{string}'  => '[a-zA-Z]+',
        '{any}'     => '[^/]+',
    ];
 
    /**
     * @param array ...$arguments
     */
    public static function get(...$arguments): void
    {
        static::addRouter('GET', $arguments);
    }
 
    /**
     * @param array ...$arguments
     */
    public static function post(...$arguments): void
    {
        static::addRouter('POST', $arguments);
    }
 
    /**
     * @param string $method
     * @param        $arguments
     */
    private static function addRouter(string $method, $arguments): void
    {

      
        $collection = collect([$arguments]);
        
   //print_r($collection);
        self::$routers[] = [
            'method'     => $method,
            'url'        => static::replaceUrl($collection->get(0)),
            'parse_url'  => static::parse($collection->get(0)),
            'call'       => $collection->get(1),
        ];
    }
 
    /**
     * Служит главной точкой старта для системы роутеров
     * Метод проверяет на роутеры на совпадение
     */
    public function startRoute()
    {
        $currentUrl = route()->getCurrentUrl();
        // mvc_framevork/public/index

       // echo $currentUrl;
 
        foreach (static::$routers as $k => $v) {
            $uri = $this->returnCurrentUrl(
                $this->removeSlashes(
                    $v['url'], $currentUrl
                )
            );
 print_r($matches);
            if (preg_match_all(
                /*PREG_SET_ORDER
                Упорядочивает результаты так, что элемент $matches[0] содержит первый набор вхождений, 
               элемент $matches[1] содержит второй набор вхождений, и т.д.*/
                '#^'.$uri.'$#', $currentUrl, $matches, PREG_SET_ORDER
            )) {
                if (route()->getRequestMethod() != $v['method']) {
                    throw new \Exception('Incorrect request method');
                }
               
                $matches['call'] = $v['call'];
                break;
            }
        }
 
        if ($matches) {
            return $this->initRout($matches);
        } else {
            return $this->initNotFoundRout();
        }
    }
 
    /**
     * @param $matches
     *
     * Метод запускается в случае если пользователь перешел по правильной ссылке
     *
     * @return mixed
     * @throws RouterException
     */
    private function initRout($matches)
    {
        
        if ($matches['call'] instanceof \Closure) {
            return call_user_func($matches['call']);
        }
 
        $call = explode('@', $matches['call']);
        $class = $call[0];
        $method = $call[1];
 
        if (! class_exists($class)) {
            throw new Exception('Incorrect path to class');
        }
 
        // если всего один параметр
        if (2 == count($matches[0])) {
            call_user_func([new $class, $method], $matches[0][1]);
        } else {
            unset($matches[0][0]);
            call_user_func_array([new $class, $method], $matches[0]);
        }
    }
 
    /**
     * 404 - страница не найдена
     */
    private function initNotFoundRout()
    {
        echo '404';
    }
}
        