<div class="row">
    <div class="col-12">            
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sell List</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                              <thead>
                                   
                                          <tr>
                                            <?php $i=1;?>
                                              <th>Sl</th>
                                              <th>Invoice Id</th>
                                              <th>Name</th>
                                              <th>Date</th>
                                              <th>Total Amount</th>
                                              <th>Action</th>
                                          </tr>
                              </thead>
                        <tbody>
                      <?php while($gets=mysqli_fetch_assoc($result)){?>
                              <tr>
                              <td><?php echo $i++;?></td>
                              <td>#INVOC-<?php  echo $gets['invoice_id'] ?></td>
                              <td><?php  echo $gets['name'] ?></td>
                              <td><?php  echo $gets['date'] ?></td>
                              <td><?php  echo $gets['total'] ?></td>
                             
<td>
<a href="orderlist.php?id=<?php echo $gets['id']?>" class="btn btn-primary ml-2 btn-sm"><i class="fas fa-eye"></i></a>
<a href="?delete&&id=<?php echo $gets['id']?>" onclick="return confirm('Are Your Sure to Delete!!!')" class="btn btn-danger btn-sm">
Delete</a>
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
            

