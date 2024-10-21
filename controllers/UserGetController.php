<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/models/User.php';

// Configura o header para JSON, pois será consumido pelo front
header('Content-Type: application/json');

$novoUsuario = new User();
$novoUsuario->getUsername();
$novoUsario->getEmail();
$novoUsario->getPassword();
$novoUsario->readUser();