<?php

require_once __DIR__ . '/../controllers/AuthController.php'; // Caminho correto para a controller

$AuthController = new AuthController(); // Instancia a controller

// Definir uma rota GET para /users
$router->get('/users', function() {
    return 'Exibindo todos os usuários';
});

// Definir uma rota POST para /login
$router->post('/login', function() use ($AuthController) {
    // Agora a variável $AuthController está acessível dentro da closure
    return $AuthController->login(); // Chama o método da controller
});

// Você pode adicionar mais rotas aqui, conforme necessário
