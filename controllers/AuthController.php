<?php
class AuthController {

    public function login() {
        // Define o tipo de conteúdo para JSON
        header('Content-Type: application/json');

        // Tenta pegar os dados da requisição JSON
        $input = file_get_contents("php://input");

        // Verifica se o input não está vazio
        if (!$input) {
            http_response_code(400); // Bad Request
            echo json_encode([
                'status' => 'failed',
                'message' => 'Nenhum dado enviado'
            ]);
            return;
        }

        // Tenta decodificar os dados JSON
        $data = json_decode($input);

        // Verifica se houve erro na decodificação do JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400); // Bad Request
            echo json_encode([
                'status' => 'failed',
                'message' => 'Formato de JSON inválido'
            ]);
            return;
        }

        // Verifica se o username e password estão presentes
        $username = $data->username ?? '';
        $password = $data->password ?? '';

        // Credenciais de exemplo
        $validUsername = 'teste';
        $validPassword = 'teste123';

        // Verifica se os campos foram preenchidos
        if (empty($username) || empty($password)) {
            http_response_code(400); // Bad Request
            echo json_encode([
                'status' => 'failed',
                'message' => 'Nome de usuário ou senha não fornecidos'
            ]);
        return;
    }
    // Verifica as credenciais
    if ($username === $validUsername && $password === $validPassword) {
        // Retorna sucesso
        http_response_code(200); // Status 200 OK
        echo json_encode([
            'status' => 'success',
            'message' => 'Login bem-sucedido',
            'user' => $username
        ]);
    } else {
        // Retorna erro de autenticação
        http_response_code(401); // Status 401 Unauthorized
        echo json_encode([
            'status' => 'failed',
            'message' => 'Credenciais inválidas'
        ]);
    }
}
}


                                                           