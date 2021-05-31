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
     
            $s="SELECT invoice_id from customer_orders ORDER BY id DESC LIMIT 1";
            $g=mysqli_query($conn,$s)or die(mysqli_error($conn));
      if (mysqli_num_rows($g) > 0) {
   $max_public_id = mysqli_fetch_row($g);
   //Here it is
}

if(isset($_POST['btn']))  
{  

$invoice_id = $_POST['invoice_id'];      
$name=$_POST['name'];  
$phone=$_POST['phone'];  
$address=$_POST['address'];  
$city=$_POST['city'];  
$zip=$_POST['zip'];  
mysqli_query($conn,"insert into customer_orders(invoice_id,name,phone,address,city,zip,date) VALUES ('$invoice_id','$name','$phone','$address','$city','$zip',NOW())");  
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

$done=mysqli_query($conn,$sql); 

if($done){

extract($_GET);
$conn=mysqli_connect('localhost','root','','pharma');

$sql="  SELECT customer_orders.* ,orders.customer_id,orders.medicine_name,orders.qty,orders.price,orders.total
FROM customer_orders
INNER JOIN orders ON customer_orders.id= orders.customer_id 
where orders.customer_id IN($id)";
$result=mysqli_query($conn, $sql);
// $row=mysqli_fetch_assoc($result)

$sqls="  SELECT customer_orders.* ,orders.customer_id,
FROM customer_orders
INNER JOIN orders ON customers.id= orders.customer_id 
where orders.customer_id IN($id)";
$results=mysqli_query($conn, $sql);
$gets=mysqli_fetch_assoc($results);
        // $id=mysqli_insert_id($_POST['customer_id']); 

     echo '<script>alert("Order Successfully")</script>';
    echo '<script>location.replace("/project/admin/orderlist.php?id='.$id.'")</script>';
}

}

}
?>




<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
<!-- Custom CSS -->
<html dir="ltr" lang="en">
<head><title>Sell Medicine</title>

<link href="assets/css/style.min.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">   -->
<link href='jquery-ui.min.css' type='text/css' rel='stylesheet' >
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <script type="text/javascript">

        $(document).ready(function(){
            $("#tab_logic").on('click', '.btnDelete', function () {
    $(this).closest('tr').remove();
}); 



            $(document).on('keydown', '.medicine', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $( '#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getDetails.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,request:1
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getDetails.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                                
                                var len = response.length;

                                if(len > 0){
                                    var id = response[0]['id'];
                                    var quantity = response[0]['quantity'];
                                    var expired_date = response[0]['expired_date'];
                                    var price = response[0]['price'];

                                    document.getElementById('quantity_'+index).value = quantity;
                                    document.getElementById('expired_date_'+index).value = expired_date;
                                    document.getElementById('price_'+index).value = price;
                                    
                                }
                                
                            }
                        });

                        return false;
                    }
                });
            });

         
            // Add more
            $('#addmore').click(function(){
 
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                var html = "<tr class='tr_input'>"
                +"<td><input type='text' class='medicine' name='medicine_name[]' id='medicine_"+index+"'>"
                +"</td><td><input type='text' readonly name='quantity[]' class='quantity' id='quantity_"+index+"' ></td>"
                +"<td><input type='date' readonly name='expired_date[]' class='expired_date' id='expired_date_"+index+"' ></td>"
                +"<td><input type='text' step='0' name='qty[]' min='0'  class='qty' id='qty_"+index+"' ></td>"
                +"<td><input type='text' step='0' name='price[]' min='0'  class='price' id='price_"+index+"' ></td>"
                +"<td><input type='text' name='total[]' placeholder='0' readonly class='total' id='total_"+index+"' ></td>"
                +"<td><button class='btnDelete btn-danger btn btn-sm'><i class='fas fa-trash'></i></button></td>"
                +"</tr>";
                // Append data
                $('tbody').append(html);


                multiply();
            });
        });

    </script>
    <script>

    // onkeyup event will occur when the user
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
      if (str.length == 0) {
        document.getElementById("id").value = "";
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
            document.getElementById("id").value = myObj[2];
            document.getElementById("address").value = myObj[3];
            document.getElementById("city").value = myObj[4];
            document.getElementById("zip").value = myObj[5];
          }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "customerinfo.php?user_id=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();
      }
    }
  </script>
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



    
<form accept="" method="POST">  
<div class="row">
      <div class="col-lg-4">
        <div class="form-group">
        
          <input type='text'  id='user_id' class='form-control ' placeholder='Customer Name/Phone Number' onkeyup="GetDetail(this.value)" value="">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">

          <input type='text'  id='invoice_id' class='form-control ' placeholder='Invoice No.'
          value="<?php  echo @$max_public_id[0]+1; ?>" name="invoice_id">
        </div>
      </div>

    </div>
<div class="row">
 <div class="col-lg-4">
        <div class="form-group">
          <!-- <label>Customer Name</label> -->
          <input type="text" name="name" id="name" class="form-control   " placeholder='Customer Name' value="">
          <input type="hidden" name="id" id="id" class="form-control   " placeholder='id' value="">
        </div>
      </div>


      <div class="col-lg-4">
        <div class="form-group">
          <!-- <label>Phone</label> -->
          <input type="text" name="phone" id="phone" class="form-control  " placeholder='Phone Number' value="">
        </div>
      </div>
     
    </div>

<div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <!-- <label>Address</label> -->
          <input type="text" name="address" id="address" class=" form-control " placeholder='Address' value="">
        </div>
      </div>
      <div class="col-lg-3">
        <div class="form-group">
          <!-- <label>City</label> -->
          <input type="text" name="city" id="city" class="form-control   "  placeholder='City' value="">
        </div>
      </div>

       <div class="col-lg-1">
        <div class="form-group">
          <!-- <label>Zip</label> -->
          <input type="text" name="zip" id="zip" class="form-control   " placeholder='zip' value="">
        </div>
      </div>
    </div>





        
        <table id="tab_logic" class="table-striped table-bordered" >
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
                <td><input type='text' class='medicine' name="medicine_name[]" id='medicine_1'></td>
                <td><input type='number' readonly="readonly" name="quantity[]" class='quantity   ' id='quantity_1' ></td>
                <td><input type='date' readonly="readonly" name="expired_date[]" class='expired_date' id='expired_date_1' ></td>
                <td><input type='number'  class='qty' name="qty[]" step="0" min="0" id='qty_1' ></td>
                <td><input type='number'  class='price' name="price[]" step="0.00" min="0" id='price_1' ></td>
                <td><input type='number' placeholder='0' name="total[]" readonly class='total' id='total_1' ></td>
             <td></td>
            </tr>
            </tbody>
        </table>
        
        <br>
        <input type='submit' value='Submit' name="btn" class="btn btn-sm btn-success" >
        <button type="reset" value="Reset All"  class="btn btn-sm btn-warning"><i class="fas fa-redo-alt"></i> Reset All</button>
    
        <br>
        
</form>     
        
        <br>
        <input type='button' value='+ Add' class="btn btn-sm btn-info" id='addmore'>
 















 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>     
      <script>
$(document).ready(function(){
    $('#tab_logic tbody').on('keyup change',function(){
        calc();
    });
    

});

function calc()
{
    $('#tab_logic tbody tr').each(function(i, element) {
        var html = $(this).html();
        if(html!='')
        {
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            $(this).find('.total').val(qty*price);
            
    
        }
    });
}
      </script>






</div>











<?php include 'includes/footer.php';?> 

</div>

</div>

<?php include 'includes/js.php'?>
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>
</body>
</html>