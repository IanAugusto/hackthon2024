<?php

class AuthController {

    public function login() {
        $data = json_decode(file_get_contents("php://input"));
        $username = 'teste';
        $password = 'teste123';

        if ($username === 'teste' && $password === 'teste123') {
            // Geração de token ou sessão aqui
            echo json_encode(['message' => 'Login bem-sucedido'  => $username]);
        } else {
            echo json_encode(['message' => 'Credenciais inválidas']);
        }
    }
}
