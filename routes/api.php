<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../controllers/AuthController.php'; 

$AuthController = new AuthController(); // Instancia a controller

// Definir uma rota GET para /user
$router->get('/user', function() {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/controllers/UserGetController.php';
});

// Definir uma rota POST para /login
$router->post('/login', function() use ($AuthController) {
    // Agora a variável $AuthController está acessível dentro da closure
    return $AuthController->login(); // Chama o método da controller
});

$router->post('/register', function() {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/controllers/UserAddController.php'; 
});

$router->post('/edit', function() {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/controllers/UserEditController.php'; 
});

