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

if(isset($_POST['btn']))
{
    $add= new Medicine();
    $add->addMedicine();
}


$conn=mysqli_connect('localhost','root','','pharma');

$sql="select* from categories where status='1'";
$get_category=mysqli_query($conn,$sql);

$sql2="select* from units where status='1'";
$get_unit=mysqli_query($conn,$sql2);

$sql3='select* from manufacturers';
$get_manufacturer=mysqli_query($conn,$sql3);


 $s="SELECT code from medicines ORDER BY id DESC LIMIT 1";
$g=mysqli_query($conn,$s)or die(mysqli_error($conn));
      if (mysqli_num_rows($g) > 0) {
   $max_public_id = mysqli_fetch_row($g);

}


?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Add Medicine</title>
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
                        <h4 class="page-title">Add Medicine</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="medicine_add.php">Medicine</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Medicine</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid"><?php include 'pages/medicine/add_medicine.php';?></div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>