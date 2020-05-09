<?php


class Singleton
{
    static protected $instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    static public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}