<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;

if($_SESSION['id'] == NULL){
    header('Location:/project/admin/pages/login.php');
}
if(isset($_GET['logout']))
{
    $logout= new Logout();
    $logout->logout();
}


$conn=mysqli_connect('localhost','root','','pharma');

$out_of_stock="select* from medicines where quantity ='0'";
$result=mysqli_query($conn,$out_of_stock);

$stock="select* from medicines where quantity > '1'";
$in_stock=mysqli_query($conn,$stock);

$sql="select* from medicines";
$medicine=mysqli_query($conn,$sql);

$sql= "select* from medicines where expired_date < NOW()";
$expired_date=mysqli_query($conn,$sql);

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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Dasboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid"><?php include 'layouts/dashboard.php';?></div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>