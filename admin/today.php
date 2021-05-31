<?php 
$conn=mysqli_connect('localhost','root','','pharma');
$sql=" SELECT customer_orders.*,  orders.customer_id,orders.medicine_name,SUM(orders.total) as total  FROM customer_orders INNER JOIN orders ON customer_orders.id= orders.customer_id
where cast(customer_orders.date as Date) =cast(NOW() as Date) 
 GROUP BY orders.customer_id";


// $res=mysqli_query($conn, $sql);
$res=mysqli_query($conn,$sql);

$conn=mysqli_connect('localhost','root','','pharma');

// $sql="  SELECT customer_orders.* ,orders.customer_id, SUM(orders.total) as total FROM customer_orders INNER JOIN orders ON customer_orders.id= orders.customer_id GROUP by orders.customer_id ";
// $result=mysqli_query($conn, $sql);


?>



<div class="row mt-3">
    <div class="col-12">            
        <div class="card">
            <div class="card-body">
            	<h3>Today's Report</h3>

<table id="zero_config" class="table mt-3 table-bordered table-striped table-hover">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Invoice No.</th>
      <th scope="col">Customer's Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Date</th>
      <th scope="col">Amounts</th>
      <th scope="col">View Details</th>
    </tr>
  </thead>
  <tbody>
  	<?php $i=1;?>
  	<?php while($get=mysqli_fetch_assoc($res)){?>
    <tr class="text-center">
      <th scope="row"><?php echo $i++?></th>
      <td>#INVOC-<?php echo $get['invoice_id']?></td>
      <td><?php echo $get['name']?></td>
      <td><?php echo $get['phone']?></td>
      <td><?php echo $get['date']?></td>
      <td><?php echo $get['total']?></td>
      <td><a href="orderlist.php?id=<?php echo $get['customer_id']?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></a></i></td>
    </tr>
<?php }?>
  </tbody>
</table>

</div>
</div>
</div>
</div>


    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
   
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
