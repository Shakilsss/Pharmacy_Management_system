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
$medicine= "select* from medicines where status='1' and expired_date> NOW() and quantity>'0' ";
$get_medicine=mysqli_query($conn,$medicine);

extract($_POST);
$sql="select* from customers where id='$id'";
$result=mysqli_query($conn, $sql);
$getData=mysqli_fetch_assoc($result);



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
mysqli_query($conn,"INSERT INTO orders  
SET   
customer_id = '{$id}',  
medicine_name = '{$_POST['medicine_name'][$i]}',  
qty = '{$_POST['qty'][$i]}',  
price= '{$_POST['price'][$i]}',  
totals = '{$_POST['totals'][$i]}'
");   
} 

}

?>




<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Sell Medicine</title>
<link href="assets/css/style.min.css" rel="stylesheet">
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
          <input type="text" name="name" id="name" class="form-control" placeholder='Customer Name' value="<?php echo $getData['name']?>">
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




<div class="card">
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Medicine Name </th>
            <th class="text-center"> Quantity </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <!-- <td><input type="text" name='medicine'  placeholder='Enter Product Name' class="form-control"/></td> -->
            
<td>  
<select id="medicine" class="form-control" style="height: 35px" name="medicine_name[]" onChange="getDetails();" value="">
        <option>Choose Medicine</option>
        <?php while($get_all_medicine=mysqli_fetch_assoc($get_medicine)){?>
        <option><?php echo $get_all_medicine['names'].'('.$get_all_medicine['strength'].')'?></option>
         <?php }?>   
      </select> 
</td>
<td><input type="number" name='qty[]' placeholder='Quantiy' class="form-control qty" step="0" min="0"/></td>
<td><input type="number" name='price[]' placeholder='Price' class="form-control price" step="0.00" min="0"/></td>
<td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
</tr>

<tr id='addr1' ></tr>
  </tbody>
</table>
</div>
</div>


  <div class="row clearfix">
    <div class="col-md-4 ">  
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Total</th>
            <td class="text-center"><input type="number" name='totals[]' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
            <td><button  class="btn btn-info pull-left" name="save">Submit</button></td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
</form>
  <div class="row clearfix">
    <div class="col-md-12 mb-1">
      <button id="add_row" class="btn btn-info pull-left">+</button>
      <button id='delete_row' class="pull-right btn btn-danger"><i class="fas fa-trash"></i></button>
    </div>
  </div>

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


        
<script type="text/javascript">
    $(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
    });
    $("#delete_row").click(function(){
        if(i>1){
        $("#addr"+(i-1)).html('');
        i--;
        }
        calc();
    });
    
    $('#tab_logic tbody').on('keyup change',function(){
        calc();
    });
    $('#tax').on('keyup change',function(){
        calc_total();
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
            
            calc_total();
        }
    });
}

function calc_total()
{
    total=0;
    $('.total').each(function() {
        total += parseInt($(this).val());
    });
    $('#sub_total').val(total.toFixed(2));
    tax_sum=(total/100)*$('#tax1').val();
    $('#tax_amount').val(tax_sum.toFixed(2));
    $('#total_amount').val((tax_sum+total).toFixed(2));
}
</script>



</div>
<?php include 'includes/footer.php';?> 
</div>
</div>

<?php include 'includes/js.php'?>
</body>
</html>
