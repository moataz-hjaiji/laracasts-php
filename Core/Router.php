<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;
use Exception;

class Router
{
    protected array $routes = [];

    private function add(string $method,string $uri,string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method),
            "middleware" => null
        ];
    }
    public function get($uri,$controller): Router
    {
      $this->add('get',$uri,$controller);

      return $this;
    }
    public function post($uri,$controller): Router
    {
        $this->add('post',$uri,$controller);
        return $this;
    }
    public function delete($uri,$controller): Router
    {
        $this->add('delete',$uri,$controller);
        return $this;
    }
    public function put($uri,$controller): Router
    {
        $this->add('put',$uri,$controller);
        return $this;
    }
    public function patch($uri,$controller): Router
    {
        $this->add('patch',$uri,$controller);
        return $this;
    }
    public function only($key): static
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function route($uri, $method): void
    {
        foreach ($this->routes as $route){
            if($route['uri']===$uri && $route['method'] === strtoupper($method)){
                Middleware::resolve($route['middleware']);
                 require base_url("Http/controllers/".$route['controller']);
                 return;
            }
        }
        $this->abort();
    }
    protected function abort($code=Response::NOT_FOUND)
    {
          http_response_code($code);
          require view("{$code}");
          die();
    }
}

