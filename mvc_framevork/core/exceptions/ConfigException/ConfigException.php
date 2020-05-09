<?php

namespace Mvcframevork\Core\exceptions\ConfigException;

use Mvcframevork\Core\config\Repository;
use Mvcframevork\Core\traits\Files;

/**
 * Исключения для работы с классом Repository (config)
 *
 */
class ConfigException extends \Exception
{
    use Files;

    public function __construct($message)
    {
        \Exception::__construct($message);

        $this->writeToFile(
            '../storage/logs/error.txt',
            "\n"."Error : ".$message."\n".'Error in '.$this->getFile().' on line '.$this->getLine().' with '."\n"
            .$this->getTraceAsString()
        );
    }
}