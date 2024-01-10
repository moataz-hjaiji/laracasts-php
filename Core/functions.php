<?php


use Core\Response;
use JetBrains\PhpStorm\NoReturn;

function urlIs($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}
function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}
function authorize($condition,$status = Response::FORBIDDEN): void
{
    if(!$condition){
        abort($status);
    }
}

function base_url($path): string
{
    return BASE_URL.$path;
}
function view($path,$arg=[]): void
{
    extract($arg);
    require base_url("views/{$path}.view.html");
}
#[NoReturn] function abort($code=Response::NOT_FOUND): void
{
    http_response_code($code);
     view("{$code}");
    die();
}

#[NoReturn] function redirect($route) : void
{
    header("location: {$route}");
    die();
}
