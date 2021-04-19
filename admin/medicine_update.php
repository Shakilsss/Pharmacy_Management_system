<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;
use App\classes\Medicine;

if($_SESSION['id'] == NULL){
    header('Location:/project/admin/pages/login.php');
}
if(isset($_GET['logout']))
{
    $logout= new Logout();
    $logout->logout();
}

$conn=mysqli_connect('localhost','root','','pharma');
$sql= "select* from medicines";
$manage_medicine=mysqli_query($conn,$sql);


if(isset($_POST['btn']))
{
    $update= new Medicine();
    $update->update();
}


extract($_GET);
$conn=mysqli_connect('localhost','root','','pharma');
$sql="select* from medicines where id='$id'";
$result=mysqli_query($conn, $sql);
$getData=mysqli_fetch_assoc($result);

$conn=mysqli_connect('localhost','root','','pharma');

$sql='select* from categories';
$get_category=mysqli_query($conn,$sql);

$sql2='select* from units';
$get_unit=mysqli_query($conn,$sql2);

$sql3='select* from manufacturers';
$get_manufacturer=mysqli_query($conn,$sql3);




?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Manufacature Update</title>
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
                        <h4 class="page-title">Update Manufacturer</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="manufacturer_manage.php">Manufacturer</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Manufacturer</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid"><?php include 'pages/medicine/update.php';?></div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>