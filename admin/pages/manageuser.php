<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 8px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/*/* Set a style for the submit button */
/*.btn {*/
/*  background-color: dodgerblue;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;*/
/*}*/
/**/
.btn:hover {
  opacity: 1;
}
</style>



                <div class="row">
                    <div class="col-12">
                      
					   <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Datatable</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <?php $i=1;?>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php while($get=mysqli_fetch_assoc($manageuser)){?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                <td><?php echo $get['name']?></td>
                                                <td><?php echo $get['email']?></td>
                                                <td><?php echo $get['phone']?></td>
                                                <td><?php echo $get['status']?></td>
                                                <td>

<?php if($get['status']==1){
echo '<a href="?unpublished_id='.$get['id'].'">'.'<button type="button" class="btn btn-success 
btn-sm">Published</button></a>';
}
else{
echo '<a href="?published_id='.$get['id'].'">'.'<button type="button" class="btn btn-warning
btn-sm">Unpublished</button></a>';
                                }

                                ?>
                                 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit</button>
                                                    <a href="?delete=true&&id=<?php echo $get['id']?>" class="btn btn-danger btn-sm">Delete</a>
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
            


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          

<form action="" method="POST" style="max-width:500px;margin:auto">
  <h2>Add User Info</h2>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Enter Name" name="name">
  </div>


    <div class="input-container">
    <i class="fa fa-at icon"></i>
    <input class="input-field" type="email" placeholder="Enter Email" name="email">
  </div>
    <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Enter Phone" name="phone">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password">
  </div>

  <button type="submit" class="btn" name="btn" style="background-color: dodgerblue;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;">Register</button>
</form>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>