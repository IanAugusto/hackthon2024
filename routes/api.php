<?php
require_once '../app/Controllers/AuthController.php';

$authController = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/login') {
    $authController->login();
}

$router->get('/login', function() {
    //echo 'teste';
    $userController = new UserController();
    $userController->login();
});

?>
