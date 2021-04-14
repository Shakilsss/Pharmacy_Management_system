<?php
namespace App\classes;

class Logout {

public function logout(){

        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);

        header('Location:/project/admin/pages/login.php');
    
} 

}
