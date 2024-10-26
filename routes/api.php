<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/controllers/UserAddController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/controllers/AuthController.php'; 

$AuthController = new AuthController(); // Instancia a controller
$userAddController = new userAddController();

// Definir uma rota GET para /user
$router->get('/user/{id}', function($id) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/controllers/UserGetController.php';
});


// Definir uma rota POST para /login
$router->post('/login', function() use ($AuthController) {
    // Agora a variável $AuthController está acessível dentro da closure
    return $AuthController->login(); // Chama o método da controller
});

$router->get('/login', function() {
    
    return "teste login";
});

$router->post('/register', function() use ($userAddController) {
   
    return $userAddController->addUser(); // Chama o método do controlador para adicionar usuário
});



$router->post('/edit', function() {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/controllers/UserEditController.php'; 
});


