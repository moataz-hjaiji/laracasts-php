<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    const MAP = [
        "guest" => Guest::class,
        'auth' => Auth::class
    ];


    /**
     * @throws Exception
     */
    public static function resolve($key): void
    {
        if(!$key){
            return;
        }
        $middleware = static::MAP[$key] ?? false;
        if(!$middleware){
            throw new Exception("No found middleware found for key '{$key}' .");
        }
        (new $middleware)->handle();
    }
}
