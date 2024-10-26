<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/models/User.php';


$id_usuario = $id;


// Cria uma instância do modelo User
$novoUsuario = new User();

$userData = $novoUsuario->readUser($id_usuario);

// Verifica se o usuário foi encontrado
if ($userData) {
    // Monta a resposta JSON
    $response = [
        'username' => $userData['username'],
        'email' => $userData['email'],
        'senha' => $userData['senha'],
    ];
} else {
    // Se o usuário não for encontrado, retorna um erro
    http_response_code(404);
    $response = ['error' => 'Usuário não encontrado'];
}

// Retorna os dados em formato JSON
echo json_encode($response);
