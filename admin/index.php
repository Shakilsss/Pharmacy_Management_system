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

$sql="select* from medicines where  quantity>1";
$medicine=mysqli_query($conn,$sql);

$sql= "select* from medicines where expired_date < NOW()";
$expired_date=mysqli_query($conn,$sql);

$sql= "select* from medicines where expired_date < NOW()";
$expired_date=mysqli_query($conn,$sql);

$today= "select* from customer_orders where cast(date as Date) = cast(NOW() as Date)";
$totalsss=mysqli_query($conn,$today);

$todays= "SELECT  SUM(orders.total) as total FROM customer_orders INNER JOIN orders ON customer_orders.id= orders.customer_id
where cast(customer_orders.date as Date) = cast(NOW() as Date) GROUP by customer_orders.id=orders.customer_id";
$totalss=mysqli_query($conn,$todays);
$getsss=mysqli_fetch_assoc($totalss);

$importMedicins="SELECT  SUM(quantity * price) as totttal FROM medicines 
where cast(medicines.time as Date) = cast(NOW() as Date) ";
$getImport=mysqli_query($conn,$importMedicins);
$geet=mysqli_fetch_assoc($getImport);
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
<div class="container-fluid">



    <?php include 'layouts/dashboard.php';?>
        



    </div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>