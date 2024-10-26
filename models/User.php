<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon/Hackthon-Back/config/db.php';

class User {
    private $id_usuario;
    private $username;
    private $email;
    private $password;

    public function getIdUser(){
        return $this->id_usuario;
    }

    public function setIdUser($id_usuario){
        return $this->id_usuario = $id_usuario;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        return $this->username = $username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        return $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        return $this->password = $password;
    }

    public function creatUser(){
        try{
          $connection = Conection::connect();  
          $sql = "INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)";
          $stmt = $connection->prepare($sql);
          $stmt->bindValue(':username', $this->getUsername());
          $stmt->bindValue(':email', $this->getEmail());
          $stmt->bindValue(':password', $this->getPassword());
          $stmt->execute();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readUser(){
        try{
            $connection = Conection::connect();
            $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':id_usuario', $this->getIdUser());
            $stmt->execute();
    
            // Recupera os dados do usuário
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verifica se o usuário foi encontrado
            if ($result) {
                // Retorna os dados do usuário
                return [
                    'username' => $result['username'], // Corrigido de 'usarname' para 'username'
                    'email' => $result['email'],
                    // Você pode incluir mais campos se necessário, mas não a senha
                ];
            } else {
                return null; // Nenhum usuário encontrado
            }
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null; // Retorna null em caso de erro
        }
    }

    public function editUser(){
        try{
            $connection = Conection::connect();
            $sql = "UPDATE usuarios SET username = :username, email = :email, senha = :senha WHERE id_usuario = :id_usuario";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':id_usuario', $this->getIdUser());
            $stmt->bindValue('username', $this->getUsername());
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':password', $this->getPassword());
            $stmt->execute();

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
};

