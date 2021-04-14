<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;
use App\classes\Unit;

if($_SESSION['id'] == NULL){
    header('Location:/project/admin/pages/login.php');
}
if(isset($_GET['logout']))
{
    $logout= new Logout();
    $logout->logout();
}


$conn=mysqli_connect('localhost','root','','pharma');
$sql= "select* from unit";
$manage_unit=mysqli_query($conn,$sql);

if(isset($_GET['unpublished_id'])){
    $unpublished= new Unit();
    $unpublished->unpublishedUnit($_GET['unpublished_id']);

}

if(isset($_GET['published_id'])){
    $published= new Unit();
    $published->publishedUnit($_GET['published_id']);
}

if(isset($_GET['delete'])){
    $delete= new Unit();
    $delete->deleteUnit($_GET['id']);
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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="unit_manage.php">Unit</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Unit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid"><?php include 'pages/unit/manage_unit.php';?></div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>