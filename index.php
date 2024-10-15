<?php

// Habilitar CORS
header("Access-Control-Allow-Origin: http://localhost:5173"); // Altere para a origem do seu frontend
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once 'Router.php'; // Incluir o roteador

$router = new Router(); // Instanciar o roteador

require_once 'routes/api.php'; // Incluir o arquivo de rotas

// Capturar o método HTTP e a URI atual
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Resolver a rota e exibir a resposta
echo $router->resolve($method, $uri);