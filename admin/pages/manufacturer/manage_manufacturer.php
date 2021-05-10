<div class="row">
    <div class="col-12">            
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manufacturer List</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                              <thead>
                                    <?php $i=1;?>
                                          <tr>
                                              <th>Sl</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>
                                              <th>Address</th>
                                              <th>City</th>
                                              <th>Zip</th>
                                              <th>Action</th>
                                          </tr>
                              </thead>
                        <tbody>
                        <?php while($get=mysqli_fetch_assoc($manage_manufacturer)){?>
                              <tr>
                              <td><?php echo $i++?></td>
                              <td><?php echo $get['name']?></td>
                              <td><?php echo $get['email']?></td>
                              <td><?php echo $get['mobile']?></td>
                              <td><?php echo $get['address']?></td>
                              <td><?php echo $get['city']?></td>
                              <td><?php echo $get['zip']?></td>
                              <td>


<a href="manufacturer_update.php?update&&id=<?php echo $get['id']?>" class="btn btn-info ml-2 btn-sm">Edit</a>
<a href="?delete=true&&id=<?php echo $get['id']?>" onclick="return confirm('Are Your Sure to Delete!!!')" class="btn btn-danger btn-sm">Delete</a>
                                                  </td>
                                              </tr> <?php }?>
                                      </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>
            

