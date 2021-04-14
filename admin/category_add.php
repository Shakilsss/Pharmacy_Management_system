<?php
session_start();
include 'vendor/autoload.php';
use App\classes\Logout;
use App\classes\Category;

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
    
    if (($_POST['name'])=="" || (@$_POST['status'])=="") {
        echo '<script>alert("All field required")</script>';
    }
    else{

    $category= new Category();
    $category->addCategory();   
    }
}

?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Add Category</title>
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
                        <h4 class="page-title">Add Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="category_add.php">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <?php include 'pages/category/add_category.php';?>
        
    </div>
    <?php include 'includes/footer.php';?></div></div>

<?php include 'includes/js.php'?>
</body>
</html>