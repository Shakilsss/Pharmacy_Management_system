<div class="row d-block">
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
                                                <th>Manufacturer</th>
                                                <th>Manufacturer Price</th>
                                                <th>Sale Price</th>
                                                <th>Quantity</th>
                                                <th>Expired Date</th>
                                             
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php while($get=mysqli_fetch_assoc($manage_medicine)){?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                
                                                <td><?php echo $get['name']?></td>
                                                <td><?php echo $get['manufacturer']?></td>
                                                <td><?php echo $get['manufacturer_price']?></td>
                                                <td><?php echo $get['price']?></td>
                                                <td><?php echo $get['quantity']?></td>
                                                <td><?php echo $get['expired_date']?></td>

</tr>
<?php }?>
</tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            


  