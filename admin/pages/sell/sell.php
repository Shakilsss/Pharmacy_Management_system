<?php  
$cn=mysqli_connect('localhost','root','','pharma');  
// mysqli_select_db(,$cn);  
$medicine= "select* from medicines";
$get_medicine=mysqli_query($cn,$medicine);


if(isset($_POST['save']))  
{  
$name=$_POST['name'];  
$phone=$_POST['phone'];  
$address=$_POST['address'];  
$city=$_POST['city'];  
$zip=$_POST['zip'];  
mysqli_query($cn,"insert into record(name,phone,address,city,zip) VALUES ('$name','$phone','$address','$city','$zip')");  
// $id=mysqli_insert_id();  
for($i = 0; $i<count($_POST['productname']); $i++)  
{  
mysqli_query($cn,"INSERT INTO recode  
SET   
-- order_id = '{$id}',  
name = '{$_POST['name'][$i]}',  
phone = '{$_POST['phone'][$i]}',  
address= '{$_POST['address'][$i]}',  
city = '{$_POST['city'][$i]}',  
zip = '{$_POST['zip'][$i]}'");   
} 

}   
?>  
    <!DOCTYPE html>  
    <html>  
  
    <head>  
        <!-- <title>Invoice</title>   -->
    </head>  
  
            <body>  
                <form action="" method="POST">  
                    <div class="box box-primary">  
                        <div class="box-header">  
                            <!-- <h3 class="box-title">Invoice </h3>   -->
                        </div>  
                        
<div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Customer Phone or Name</label>
          <input type='text' name="phone" id='user_id' class='form-control' placeholder='Customer Name/Phone Number' onkeyup="GetDetail(this.value)" value="">
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

    function GetDetails(str) {
      if (str.length == 0) {
        document.getElementById("medicine").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("expired_date").value = "";
        document.getElementById("unit").value = "";
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
            // document.getElementById("medicine").value = myObj[0];
            document.getElementById("quantity").value = myObj[0];
            document.getElementById("expired_date").value = myObj[1];
            document.getElementById("unit").value = myObj[2];
          }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "infomedicine.php?medicine=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();
      }
    }





  </script>







      <!-- <input type="submit" class="btnbtn-primary" name="save" value="Save Record">   -->
</div><br/> 

<table class="table table-bordered" id="tab_logic">
        <thead>
        <tr>
            <th class="text-center">Sl</th>
            <th class="text-center">Medicine Name</th>
            <th class="text-center">Avaiable</th>
            <th class="text-center">Expired Date</th>
            <th class="text-center">Unit</th>
            <th class="text-center">Quantity</i></th>
            <th class="text-center">Price</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>

        </thead>
        <tr>
            <!-- <td class="row-index text-center"><p>1</p></td> -->

        <tbody id="tbody">

        </tbody>


<div class="table table-bordered table-hover col-lg-4" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
    



    </table>
    <button class="btn btn-md btn-primary" id="addBtn" type="button">+ Add</button>
    <input type="submit" class="btn btn-success" name="save" value="Save Record"> 

                   
</form>  
</body>  
</html> 
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
<script>
    $(document).ready(function () {

    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addBtn').on('click', function () {

        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center"><p>${rowIdx}</p></td>
  <td>
  <input class="form-control" style="height: 35px" name="names[]" id="medicine" onChange="GetDetails(this.value)">

  </td>
  
  <td>
      <input id="quantity" readonly type="text" name='quantity[]'  placeholder='0' class="form-control" value=""/>
  </td>
  
  <td>
      <input id="expired_date" readonly value="" type="Date" name='expired_date[]'  placeholder='Expired Date' class="form-control"/>
  </td>
  
  <td>
      <input id="unit" readonly value="" type="text" name='unit[]'  placeholder='Unit' class="form-control"/>
  </td>
  
  <td>
      <input type="number"  name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/>
  </td>
  
  <td>
      <input type="number"  name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/>
  </td>
  <td>
      <input type="number"  name='total[]' placeholder='0.00' class="form-control total" readonly/>
  </td>

 <td class="text-center">
      <button class="btn btn-danger remove"type="button"><i class="fas fa-trash"></i></button>
  </td>
</tr>`);
});

    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function () {

        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();

        // Iterating across all the rows
        // obtained to change the index
        child.each(function () {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(` ${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest('tr').remove();

        // Decreasing total number of rows by 1.
        rowIdx--;
    });
    });
</script>


