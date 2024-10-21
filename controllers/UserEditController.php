<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/models/User.php';

// Configura o header para JSON, pois será consumido pelo front
header('Content-Type: application/json');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$novoUsuario = new User;
$novoUsario->setUsername($username); # subtitui com o novo nome
$novoUsario->setEmail($email);
$novoUsuario->setPassword($password);
$novoUsario->editUser(); # chama a model para atualizar banco de dados
exit();