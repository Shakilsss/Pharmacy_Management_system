<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;
use App\classes\Adduser;

if($_SESSION['id'] == NULL){
    header('Location:/project/admin/pages/login.php');
}
if(isset($_POST['btn']))
{
    $user= new Adduser();
    $user->adduser();

}

if(isset($_GET['logout']))
{
    $logout= new Logout();
    $logout->logout();
}

?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Admin Dashboard</title>
    <?php include'includes/head.php';?> 
</head>
<body> 
<?php include 'includes/loader.php';?>  
    <div id="main-wrapper">    
<?php include 'includes/header.php'; ?>    
<?php include 'includes/aside.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid"><?php include 'pages/adduser.php';?></div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>