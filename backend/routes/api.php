<?php
require_once '../controllers/UserController.php';

$router = new Router();

$router->post('/login', function() {
    $data = json_decode(file_get_contents("php://input"));
    $userController = new UserController();
    echo json_encode($userController->login($data->email, $data->senha));
});
?>
