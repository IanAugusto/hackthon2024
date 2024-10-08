<?php
//require_once '../Models/User.php';
//require_once '../config/database.php';

class AuthController {
    //private $db;
    //private $user;

    //public function __construct() {
        //$database = new Database();
        //$this->db = $database->getConnection();
        //$this->user = new User($this->db);
    //}

    public function login() {
        $data = json_decode(file_get_contents("php://input"));
        $username = 'teste';
        $password = 'teste123';

        if ($username === 'teste' && $password === 'teste123') {
            // Geração de token ou sessão aqui
            echo json_encode(['message' => 'Login bem-sucedido', 'user' => $username]);
        } else {
            echo json_encode(['message' => 'Credenciais inválidas']);
        }
    }
}
