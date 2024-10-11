<?php

class Router {
    private $routes = [];

    // Adiciona uma rota GET
    public function get($route, $callback) {
        $this->routes['GET'][$route] = $callback;
    }

    // Adiciona uma rota POST
    public function post($route, $callback) {
        $this->routes['POST'][$route] = $callback;
    }

    // Resolve a rota
    public function resolve($method, $uri) {
        // Remover query string (parte depois do ?)
        $uri = parse_url($uri, PHP_URL_PATH);

        // Remover o path base (se o projeto estiver em um subdiretório)
        $basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        if ($basePath !== '/') {
            $uri = str_replace($basePath, '', $uri);
        }

        // Verifica se a rota existe para o método e URI fornecidos
        if (isset($this->routes[$method][$uri])) {
            return call_user_func($this->routes[$method][$uri]);
        }

        return '404 Not Found'; // Retorna um 404 se a rota não for encontrada
    }
}
