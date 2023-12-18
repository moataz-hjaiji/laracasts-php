<?php
$routes = require base_url('Core/routes.php');

function routeToController($uri,$routes){
  if(array_key_exists($uri,$routes)){
    require $routes[$uri];
  }else{
    abort();
  }
}
function abort($code=Response::NOT_FOUND){

  http_response_code($code);
  require "views/{$code}.view.html";
  require view("{$code}");
  die();
}
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri,$routes);
