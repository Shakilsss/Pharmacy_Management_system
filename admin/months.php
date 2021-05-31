<?php 
$conn=mysqli_connect('localhost','root','','pharma');
$sql=" SELECT customer_orders.*, orders.customer_id,orders.medicine_name,orders.total FROM customer_orders INNER JOIN orders ON customer_orders.id= orders.customer_id WHERE  customer_orders.date BETWEEN DATE_SUB(NOW(), INTERVAL month DAY)
AND NOW()";


// $res=mysqli_query($conn, $sql);
$res=mysqli_query($conn,$sql);

// if($res)
// {
//  echo 'ok';
// }

// else die('error'.mysqli_error($conn));


?>



<div class="row mt-3">
    <div class="col-12">            
        <div class="card">
            <div class="card-body">
              <h3>Last 7day's Report</h3>

<table id="zero_config" class="table mt-3 table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Invoice No.</th>
      <th scope="col">Customer's Name</th>
      <th scope="col">Medicines Name</th>
      <th scope="col">Date</th>
      <th scope="col">Amonunts</th>
    </tr>
  </thead>
  <tbody>
        <?php $i=1;?>
    <?php while($get=mysqli_fetch_assoc($res)){?>
    <tr>
      <th scope="row">    <?php echo $i++;?></th>
      <td>#INVOC-<?php echo $get['invoice_id']?></td>
      <td><?php echo $get['name']?></td>
      <td><?php echo $get['medicine_name']?></td>
      <td><?php echo $get['date']?></td>
      <td><?php echo $get['total']?></td>
    </tr>
<?php }?>
  </tbody>
</table>

</div>
</div>
</div>
</div>
