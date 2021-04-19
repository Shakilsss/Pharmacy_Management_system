<?php  
$cn=mysqli_connect('localhost','root','','pharma'); 
$medicine= "select* from medicine";
$get_medicine=mysqli_query($cn,$medicine);

 
 
if(isset($_POST['save']))  
{  
$name=$_POST['name'];  
$location=$_POST['location'];  
$sql="insert into tbl_order(name,location) VALUES ('$name','$location')";

$get=mysqli_query($cn,$sql);  
if($get){
$id=mysqli_insert_id($cn);     
}
for($i = 0; $i<count($_POST['productname']); $i++)  
{  
mysqli_query($cn,"INSERT INTO tbl_orderdetail  
SET   
order_id = '{$id}',  
product_name = '{$_POST['productname'][$i]}',  
quantity = '{$_POST['quantity'][$i]}',  
price = '{$_POST['price'][$i]}',  
discount = '{$_POST['discount'][$i]}',  
amount = '{$_POST['amount'][$i]}'");   
}  


}   
?>  




<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<script>
    $(document).ready(function () {

    // Denotes total number of rows
    var rowIdx = 1;

    // jQuery button click event to add a row
    $('#addBtn').on('click', function () {

        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center">
            <p>${rowIdx}</p>
            </td>



            <td><input type="text" name='productname[]'  placeholder='' class="form-control"/></td>
            <td><input type="text" name='quantity[]'  placeholder='Avaiable' class="form-control"/></td>
            <td><input type="text" name='expired_date[]'  placeholder='Expired Date' class="form-control"/></td>
            <td><input type="text" name='unit[]'  placeholder='Unit' class="form-control"/></td>
            <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>


            <td class="text-center">
                <button class="btn btn-danger remove"
                type="button"><i class="fas fa-trash"></i></button>
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




<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>



<div class="container pt-4">
    <div class="table-responsive">
                            <div class="box box-primary">  
                        <div class="box-header">  
                            <h3 class="box-title">Invoice </h3>  
                        </div>  
                        <div class="box-body">  
                            <div class="form-group">  
                                ReceiptName  
                                <input type="text" name="name" class="form-control">  
                            </div>  
                            <div class="form-group">  
                                Location  
                                <input type="text" name="location" class="form-control">  
                            </div>  
                        </div>  
                          
                    </div>
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
            <td class="row-index text-center"><p>1</p></td>
            <td>

        <select class="form-control" name="productname[]">
        <option>Choose Medicine Name</option>
        <?php while($get_all_medicine=mysqli_fetch_assoc($get_medicine)){?>
        <option><?php echo $get_all_medicine['name'].'('.$get_all_medicine['strength'].')'?></option>
         <?php }?>   
         </select>       
            </td>
            <td>


            </td>
            <td><input type="date" readonly="" name='expired_date[]'  placeholder='Expired Date' class="form-control"/></td>
            <td><input type="text" readonly="" name='unit[]'  placeholder='Unit' class="form-control"/></td>
            <td><input type="number" name='qty[]' placeholder='Quantity' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' placeholder='Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
            <td class="text-center"><button class="btn btn-danger remove"type="button"><i class="fas fa-trash"></i></button></td>
          </tr>
        <tbody id="tbody">

        </tbody>
    </table>

    </div>
    <div class="row clearfix">
    <div class="pull-right col-md-3">
      <table class="table table-bordered table-hover" id="tab_logic_total">
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
      </form>
    </div>
  </div>
    <button class="btn btn-md btn-primary" id="addBtn" type="button"><b>+</b></button>
    <input type="submit" class="btn btn-success pull-right" name="save" value="Save Record"> 

</div>



 

    </div>
  </div>
</div>





</body>
</html>



<script type="text/javascript">  

$(document).ready(function(){
    // var i=1;
    // $("#add_row").click(function(){b=i-1;
    //     $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
    //     $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
    //     i++; 
    // });
    // $("#delete_row").click(function(){
    //     if(i>1){
    //     $("#addr"+(i-1)).html('');
    //     i--;
    //     }
    //     calc();
    // });
    
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
    tax_sum=total/100*$('#tax').val();
    $('#tax_amount').val(tax_sum.toFixed(2));
    $('#total_amount').val((tax_sum+total).toFixed(2));
}


</script>  