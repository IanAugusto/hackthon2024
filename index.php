<?php

require_once 'Router.php'; // Incluir o roteador

$router = new Router(); // Instanciar o roteador

require_once 'routes/api.php'; // Incluir o arquivo de rotas

// Capturar o método HTTP e a URI atual
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Resolver a rota e exibir a resposta
echo $router->resolve($method, $uri);
