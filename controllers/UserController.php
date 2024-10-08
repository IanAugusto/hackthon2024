<?php>

class UserController 
{
    public function login(){
    
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == 'teste' && $password == 'teste123') {
                $_SESSION['user_id'] = 2;
                $_SESSION['username'] = 'teste';
                $_SESSION['password'] = 'teste123';
                $_SESSION['remember'] = true;
                echo "Login successful";
            } else {
                echo "Invalid username or password";
            }
        }  
    }
}


