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

function login($user): void
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID','',time() - 3600,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}
