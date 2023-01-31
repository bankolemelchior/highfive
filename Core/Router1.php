<?php
/**
 * 
 * 
 * 
 * 
 */

 class Router {

    private array $routes;

    public function register(string $path, callable $action):void 
    {
        $this->routes[$path] = $action;
    }

    public function resolve(string $uri): mixed
    {
        $path = explode('?', $uri)[0];
        $action = $this->routes[$path] ?? null;

        if(!is_callable($action)) {
            throw new Exception('page introuvable');
        }

        return $action();
    }
 }


