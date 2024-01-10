<?php

namespace Core;

class Container
{
    protected array $bindings = [];
    public function bind(string $key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @throws \Exception
     */
    public function resolve($key)
    {
        if(!array_key_exists($key,$this->bindings)){
            throw new \Exception('No matching binding found for '.$key);
        }

            $resolver = $this->bindings[$key];
            return call_user_func($resolver);

    }

}
