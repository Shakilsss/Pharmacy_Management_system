<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;
use App\classes\Manufacturer;

if($_SESSION['id'] == NULL){
    header('Location:/project/admin/pages/login.php');
}
if(isset($_GET['logout']))
{
    $logout= new Logout();
    $logout->logout();
}

if(isset($_POST['btn'])){

    if($_POST['name']==''||$_POST['email']==''||$_POST['mobile']==''||$_POST['address']==''||$_POST['city']==''||$_POST['zip']==''){
        echo '<script>alert("All Field Required")</script>';

    }
    else{
    $add=new Manufacturer();
    $add->addManufacturer();   
    }
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Add Manufacturer</title>
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
                        <h4 class="page-title">Add Manufacturer </h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="manufacturer_add.php">Manufacture</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Manufacturer</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid"><?php include 'pages/manufacturer/add_manufacturer.php';?></div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>