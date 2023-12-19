<?php

namespace Core;

class Router
{
    protected array $routes = [];

    private function add(string $method,string $uri,string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method)
        ];
    }
    public function get($uri,$controller): void
    {
      $this->add('get',$uri,$controller);
    }
    public function post($uri,$controller): void
    {
        $this->add('post',$uri,$controller);
    }
    public function delete($uri,$controller): void
    {
        $this->add('delete',$uri,$controller);
    }
    public function put($uri,$controller): void
    {
        $this->add('put',$uri,$controller);
    }
    public function patch($uri,$controller): void
    {
        $this->add('patch',$uri,$controller);
    }
    public function route($uri,$method)
    {
        foreach ($this->routes as $route){
            if($route['uri']===$uri && $route['method']=== strtoupper($method)){
                return require base_url($route['controller']);
            }
        }
        $this->abort();
    }
    protected function abort($code=Response::NOT_FOUND): void
    {
          http_response_code($code);
          require view("{$code}");
          die();
    }
}

