<?php

use Core\Session;


const BASE_URL = __DIR__.'/../';
require BASE_URL."/vendor/autoload.php";
require BASE_URL . '/Core/functions.php';


session_start();

require base_url('bootstrap.php');

$router = new \Core\Router();

$routes = require base_url('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
    $router->route($uri,$method);
}catch (\Core\ValidationException $e){
    Session::flash("errors",$e->errors);
    Session::flash('old',$e->old);
    redirect($router->previousUrl());
}

Session::unflash();




