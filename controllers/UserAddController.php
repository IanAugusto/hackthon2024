<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/models/User.php';

// Configura o header para JSON, pois será consumido pelo front
header('Content-Type: application/json');


if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Email inválido']);
exit();
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


$username =  $_POST['username'];
if (empty($username) || strlen($username) < 3){
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Campo de usuário vazio ou menor que 3 caracteres']);
    exit();
}
$password = $_POST['password'];
if ( empty($username) ||strlen($password) < 6){
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'senha menor que 6 caracteres ou campo vazio']);
    exit();
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$novoUsuario = new User();
$novoUsario->setUsername($username);
$novoUsuario->setEmail($email);
$novoUsuario->setPassword($password);

if ($novoUsuario->creatUser()) {
    // Se o usuário foi criado com sucesso
    http_response_code(201); // Código de sucesso para criação (201 Created)
    echo json_encode(['status' => 'success', 'message' => 'Usuário cadastrado com sucesso']);
} else {
    // Caso ocorra um erro ao salvar
    http_response_code(500); // Código de erro interno do servidor
    echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar o usuário']);
}
exit();    





