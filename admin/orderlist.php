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




extract($_GET);
$conn=mysqli_connect('localhost','root','','pharma');

$sql="  SELECT
  customer_orders.*,
  orders.*,
  medicines.*,medicines.names as medicine_name
FROM customer_orders
JOIN orders
  ON customer_orders.id = orders.customer_id
JOIN medicines
  ON medicines.id = orders.medicine_id
where orders.customer_id IN($id)";
$result=mysqli_query($conn, $sql);
// $row=mysqli_fetch_assoc($result)

$sqls="  SELECT customer_orders.* ,orders.customer_id,
FROM customer_orders
INNER JOIN orders ON customers.id= orders.customer_id 
where orders.customer_id IN($id)";
$results=mysqli_query($conn, $sql);
$gets=mysqli_fetch_assoc($results);

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Sell List</title>
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
<!-- <h4 class="page-title">Sell List of</h4> -->
<div class="ml-auto text-right">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<!-- <li class="breadcrumb-item active" aria-current="page">Sell List of</li> -->
</ol>
</nav>
</div>
</div>
</div>
</div>



<div class="container-fluid">

<div class="row justify-content-center" id="print">

				<div class="card-header bg-info col-9" >
				<h2 class="mb-0 text-center text-white text-uppercase" >HOMOEO HOME</h2>
				</div>
	<div class="col-9">

		<div class="card">
			<div class="card-body">


<div class="row">
<div class="col-6">
<h4 class="text-primary">Company Details</h4>
<span> <strong>Address</strong> : Plot-14, Main Road-01, Mirpur-10, Dhaka</span><br>
<span><strong>Phone&emsp;</strong> : 01712-011389</span>
</div>

    <div class="col-4 invoice" style="margin-bottom: 10px;margin-top: 10px ">
    	<table border="1" class="table table-bordered table-sm" style=" border-collapse: collapse;" >
    		<tr><td>Invoice No </td><td>#INVOC-<?php echo $gets['invoice_id']?></td></tr>
        <tr><td>Date  </td><td><?php echo $gets['date']?></td></tr>
    		<tr><td colspan="2" align="center">Customer's Copy</td></td></tr>
    	</table>

    </div>

</div>





<div class="row mt-3">
<div class="col-6">
<h4 class="text-primary">Customer Details</h4>
<span><strong>Name</strong>&emsp;&emsp;: <?php echo $gets['name']?></span><br>
<span><strong>Address</strong>&emsp;: <?php echo $gets['address']?></span><br>
<span><strong>Phone</strong>&emsp;&emsp;: <?php echo $gets['phone']?></span><br>
<span><strong>City</strong>&emsp;&emsp;&emsp;: <?php echo $gets['city']?></span><br>
<span><strong>Zip</strong>&emsp;&nbsp;&emsp;&emsp;: <?php echo $gets['zip']?></span>
</div>
</div>






<table class=" data table table-hover table-bordered text-center table-sm" border="1" style=" border-collapse: collapse; margin-top: 10px">
<thead>
<?php $i=1;?>
<tr>
<th><strong>Sl</strong></th>
<th><strong>Medicine Name</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Unit Price</strong></th>
<th><strong>Total</strong></th>
</tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $i++?></td>	
<td><?php echo $row['medicine_name']?></td>
<td><?php echo $row['qty']?></td>
<td><?php echo $row['price']?></td>
<td><?php echo $row['total']?></td>
</tr>
<?php } 
extract($_POST);
$sqls="SELECT SUM(total) as total FROM orders where customer_id='$id'";
$get=mysqli_query($conn,$sqls);
$getss=mysqli_fetch_assoc($get);
?>
<tr>
<td colspan="3"></td>
<td><b>Total</b></td>
<td><?php echo $getss['total'] ?></td>

</tr>
</tbody>  
</table>
<br>
  <div class="row">
    <div class="col">
      <span>________________</span><br>
      <span>Author Signature</span>
    </div>
    <div class="col text-right customer" >
      <span style="float: right;">___________________</span><br>
     <span style="float: right;">Customer Signature</span>
    </div>
  </div>

<?php include 'demo2.php';?>

<style media="print">
 @page {
  size: A4;
  /*margin: 0;*/
  margin-top: 0;
  margin-bottom: 0;
       }

    h2{
    	
    	text-align: center;
    	margin: 50px
    }   
    .invoice{
    	width: 25%;
    	float: right;
    	margin-top: -30px !important; 
    }
    table {
    	width: 100%;

    }
    .data{
    	text-align: center;
    }
.customer{
    margin-top: -35px;
}

</style>

<!-- <div class="row mt-3"> -->
<!-- <div class="col-lg-12 text-center"> -->
<div class="text-right justify-content-md-end">
<button  id='print_button' class="btn btn-info" onclick="$('#print').print();">Print</button>
</div>
<!-- </div> -->
<!-- </div> -->


</div>
<!-- </form> -->

</div>
</div>




</div>




</div>


<?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
<script type="text/javascript">



$.fn.extend({
print: function() {
var frameName = 'printIframe';
var doc = window.frames[frameName];
var printButton = document.getElementById("print_button");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
if (!doc) {
$('<iframe>').hide().attr('name', frameName).appendTo(document.body);
doc = window.frames[frameName];
}
doc.document.body.innerHTML = this.html();
doc.window.print();
 printButton.style.visibility = 'visible';
return this;
}
});
</script>
</body>
</html>


