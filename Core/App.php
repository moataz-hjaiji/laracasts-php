<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function getContainer()
    {
        return static::$container;
    }
    public static function resolve($key): void
    {
        static::$container->resolve($key);
    }
    public static function bind($key,$resolver)
    {
        static::$container->bind($key,$resolver);
    }
}
