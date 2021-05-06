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
// $medicine= "select* from medicines where status='1' and expired_date> NOW() and quantity>'0' ";
// $get_medicine=mysqli_query($conn,$medicine);


if(isset($_POST['save']))  
{  
$name=$_POST['name'];  
$phone=$_POST['phone'];  
$address=$_POST['address'];  
$city=$_POST['city'];  
$zip=$_POST['zip'];  
mysqli_query($conn,"insert into customer_orders(name,phone,address,city,zip) VALUES ('$name','$phone','$address','$city','$zip')");  
$id=mysqli_insert_id($conn);  

for($i = 0; $i<count($_POST['medicine_name']); $i++)  
{  
$sql="INSERT INTO orders  
SET   
customer_id = '{$id}',  
medicine_name = '{$_POST['medicine_name'][$i]}',  
qty = '{$_POST['qty'][$i]}',  
price = '{$_POST['price'][$i]}',  
total = '{$_POST['total'][$i]}'";  

mysqli_query($conn,$sql); 

}

}
?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Sell Medicine</title>
<link href="assets/css/style.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
                        <h4 class="page-title">Medicine Sell</h4>
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
<div class="card">
<div class="card-body">  

 <form method="POST" >    



<div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Customer Phone or Name</label>
          <input type='text'  id='user_id' class='form-control' placeholder='Customer Name/Phone Number' onkeyup="GetDetail(this.value)" value="">
        </div>
      </div>
    </div>
    <div class="row">
 <div class="col-lg-4">
        <div class="form-group">
          <!-- <label>Customer Name</label> -->
          <input type="text" name="name" id="name" class="form-control" placeholder='Customer Name' value="">
        </div>
      </div>


      <div class="col-lg-4">
        <div class="form-group">
          <!-- <label>Phone</label> -->
          <input type="text" name="phone" id="phone" class="form-control" placeholder='Phone Number' value="">
        </div>
      </div>
     
    </div>

     <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <!-- <label>Address</label> -->
          <input type="text" name="address" id="address" class="form-control" placeholder='Address' value="">
        </div>
      </div>
      <div class="col-lg-3">
        <div class="form-group">
          <!-- <label>City</label> -->
          <input type="text" name="city" id="city" class="form-control"  placeholder='City' value="">
        </div>
      </div>

       <div class="col-lg-1">
        <div class="form-group">
          <!-- <label>Zip</label> -->
          <input type="text" name="zip" id="zip" class="form-control" placeholder='zip' value="">
        </div>
      </div>
    </div>

</div>





  <table border='1' style='border-collapse: collapse;' id="tbUser">
            <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Available</th>
                <th>Expired Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr class='tr_input'>
                <td><input type='text'  class='medicine' id='medicine_1' ></td>
                <td><input type='text' readonly class='quantity' id='quantity_1' ></td>
                <td><input type='text' readonly class='expired_date' id='expired_date_1' ></td>
                <td><input type='text' readonly class='qty' id='qty' ></td>
                <td><input type='text' readonly class='price' id='price' ></td>
                <td><input type='text' readonly class='total' id='total' ></td>
                <td></td>
            </tr>
            </tbody>
        </table>

    </div>




</div>
</div>


</div>





</form>


</div>
</div>

<script>

    // onkeyup event will occur when the user
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
      if (str.length == 0) {
        document.getElementById("name").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("address").value = "";
        document.getElementById("city").value = "";
        document.getElementById("zip").value = "";
        return;
      }
      else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

          // Defines a function to be called when
          // the readyState property changes
          if (this.readyState == 4 && this.status == 200) {
            
            var myObj = JSON.parse(this.responseText);
            document.getElementById("name").value = myObj[0];
            document.getElementById("phone").value = myObj[1];
            document.getElementById("address").value = myObj[2];
            document.getElementById("city").value = myObj[3];
            document.getElementById("zip").value = myObj[4];
          }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "customerinfo.php?user_id=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();
      }
    }
  </script>


 


</div>
<?php include 'includes/footer.php';?> 
</div>
</div>

<?php include 'includes/js.php'?>
</body>
</html>
