<div class="row">
<div class="col-12">                      
 <div class="card">

                            <div class="card-body">
                                <!-- <h5 class="card-title">Manage Medicine</h5> -->
                                <div class="table-responsive">
                                    <table id="zero_config" class="table  table-bordered">
                                        <thead>
                                            <?php $i=1;?>
                                            <tr>
                                                <th>Sl</th>
                                                <!-- <th>Code</th> -->
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Manufacturer</th>
                                                <th>Strength</th>
                                                <th>Shelf</th>
                                                <th>Quantity</th>
                                                <th>Manufacturer_Price</th>
                                                <th>Price</th>
                                                <th>Expired_Date</th>
                                                <th>Import_Date_and_Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php while($get=mysqli_fetch_assoc($manage_medicine)){?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                
                                                <td><?php echo $get['names']?></td>
                                                <td><?php echo $get['name']?></td>
                                                <td><?php echo $get['manufacturer']?></td>
                                                <td><?php echo $get['strength']?></td>
                                                <td><?php echo $get['shelf']?></td>
                                                <td <?php echo $get['quantity']==0? "style='color:red' ": "style='color:black'" ?>><?php echo $get['quantity']?></td>
                                                <td><?php echo $get['manufacturer_price']?></td>
                                                <td><?php echo $get['price']?></td>
                                                <td <?php echo $get['expired_date']> Date("Y-M-D")? "style='color:black' ": "style='color:red'" ?>><?php echo $get['expired_date']?></td>
                                                <td><?php echo $get['time'];?></td>

<td>
<?php if($get['status']==1){
echo '<a href="?unpublished_id='.$get['id'].'">'.'<button type="button" class="btn btn-success 
btn-sm "><i class="fas fa-arrow-up"></i> Published</button></a> ';
}
else{
echo '<a href="?published_id='.$get['id'].'">'.'<button type="button" class="btn btn-warning
btn-sm "><i class="fas fa-arrow-down"></i> Unpublished</button></a>';}?>

<a style="margin-top: -52px !important;margin-left: 95px;" href="medicine_update.php?update=true&&id=<?php echo $get['id']?>" class="btn btn-info btn-sm " ><i class="fas fa-edit"></i> Edit</a>

<a style="margin-top: -93px !important;margin-left: 158px;" href="?delete=true&&id=<?php echo $get['id']?>" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to delete')"><i class="fas fa-trash"></i> Delete</a>
</td>
</tr>
<?php }?>
</tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            


  