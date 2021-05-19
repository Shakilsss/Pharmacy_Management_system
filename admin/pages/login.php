<?php 
include '../vendor/autoload.php';
use App\classes\login;
session_start();
if(isset($_SESSION['id'])){
    header('Location:/project/admin/index.php');
}
if(isset($_POST['btn']))
{
    $login= new Login();
    $login->adminLogin();   
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     

<style type="text/css">
    

body {
  background-image: url('../bc.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}



</style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Admin Login</title>
  </head>
  <body >

<div class="container login-container">

<style>
.login-form {
    width: 340px;
    margin: 50px auto;
    font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 5px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
<div class="login-form">
    <form method="post">
        <h2 class="text-center">Admin Login Form</h2>       
        <div class="form-group">
            <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email"  required="required" />
        </div>
        <div class="form-group">
             <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required="required" />
        </div>
        <div class="form-group">
             <input type="submit" class="btn btn-info border-rounded shadow" name="btn" value="Sign In"  />
        </div>
           
    </form>
    
</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    
  </body>
</html>