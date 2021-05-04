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
    
    .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}

.login-form-2{

    padding: 5%;
    background: #0062cc;
    box-shadow: 0px 0px 5px white;
               
              
    /*border-radius: 10px;*/
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 5%;
}

.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}

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
            <div class="row justify-content-center">
         
                <div  class="col-6 login-form-2">
                    <h3>Login Admin</h3>
                    <form style="margin-bottom: -53px;" action="" method="POST">
                        <div class="form-group w-100">
                        <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" />
                        </div>
                    <div class="form-group w-100 ">
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" />
                        </div>

                        <div class="form-group" align="center">
                            <input type="submit" class="btnSubmit btn" name="btn" value="Sign In"  />
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>




   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    
  </body>
</html>