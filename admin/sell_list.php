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

if(isset($_GET['delete']))
{  

$conn=mysqli_connect('localhost','root','','pharma');

    extract($_GET);
   $sql="delete from customer_orders where id='$id'";
   $x=mysqli_query($conn,$sql);
   if($x){
    echo '<script>alert("Delete Successfully")</script>';
    echo '<script>location.replace("/project/admin/sell_list.php")</script>';

   }
}


$conn=mysqli_connect('localhost','root','','pharma');

$sql="  SELECT customer_orders.* ,orders.customer_id,orders.total
FROM customer_orders
INNER JOIN orders ON customer_orders.id= orders.customer_id ";
$result=mysqli_query($conn, $sql);

?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Sell Medicines</title>
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
                        <h4 class="page-title">Sell Medicine</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Sell Medicine</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">



    <?php include 'pages/sell/sell.php';?>
        



    </div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>