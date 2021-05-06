<!doctype html>
<html>
<head>
<title>How</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/> 
<link href='jquery-ui.min.css' type='text/css' rel='stylesheet' >
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
			
   
			$("#tbUser").on('click', '.btnDelete', function () {
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

                                    document.getElementById('quantity_'+index).value = quantity;
                                    document.getElementById('expired_date_'+index).value = expired_date;
                                    
                                }
                                
                            }
                        });

                        return false;
                    }
                });
            });
            
            // Add more
            $('#addmore').click(function(){

                // Get last id 
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
var html = "<tr class='tr_input'>"
			+"<td><input  type='text' class='medicine' id='medicine_"+index+"' ></td>"
			+"<td><input readonly type='text' class='quantity' id='quantity_"+index+"' ></td>"
			+"<td><input readonly type='text' class='expired_date' id='expired_date_"+index+"' ></td>"
			+"<td><input  readonly type='text' class='qty' id='qty'></td>"
			+"<td><input readonly type='text' class='price' id='price'></td>"
			+"<td><input readonly type='text' class='total' id='total'></td>"
			+"<td><button class='btnDelete btn-danger btn btn-sm'><i class='fas fa-trash'></i></button></td>"
			+"</tr>";

                // Append data
                $('tbody').append(html);
                
            });
        });

    </script>

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
</head>
<body >

<div class="container-fluide">


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




        <table border='1' style='border-collapse: collapse;' id="tbUser" class="table border">
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



<div >
<span class="form-control "  style="border: 1px solid black; width: 20%;float: right;" class="table">Total Price</span>
</div>

        <input type='submit' value='Submit' class="btn btn-info btn-sm" >
        <input type='button' value='Back to Dashboard' class="btn btn-info btn-sm" >
        <input type='button' value='+' class="btn btn-info btn-sm" id='addmore'>


</div>
</div>






</form>

</body>
</html>

