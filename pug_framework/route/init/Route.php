<?php

namespace Pug_Framework\Route\Init;

final class Route
{
    public $routes = [];
    /**
     * @param string $method
     * @param string $path
     * @param callable $callable
     * @return void
     */
    public function route(string $method = '', string $path, callable $callable): void
    {
        $this->routes[$path] = $callable;
    }
    /**
     * @return void
     */
    public function run(): void
    {
        $this->routes;

        $url = $_SERVER['REQUEST_URL'];
        $found = false;
        foreach ($this->routes as $path => $callable) {
            if ($path !== $url) continue;

            $callable();
            $found = true;
        }

        if (!$found) {
            $notFoundCallBack = $this->routes['/404'];
            $notFoundCallBack();
        }
    }
}
