<?php

function urlIs($url){
    return $_SERVER['REQUEST_URI'] === $url;
}
function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}
function authorize($condition,$status = Response::FORBIDDEN)
{
    if(!$condition){
        abort($status);
    }
}

function base_url($path): string
{
    return BASE_URL.$path;
}
function view($path,$arg): string
{
    extract($arg);
    require base_url("views/{$path}.view.html");
}
