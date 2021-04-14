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
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php while($get=mysqli_fetch_assoc($manage_unit)){?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                <td><?php echo $get['name']?></td>
                                                <td><?php echo $get['status']=='1'?'Published':'Unpublished'?></td>
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

<a href="unit_update.php?delete=true&&id=<?php echo $get['id']?>" class="btn btn-info btn-sm">Edit</a>
<a href="?delete=true&&id=<?php echo $get['id']?>" onclick="return confirm('Are you sure to delete!!!')" class="btn btn-danger btn-sm">Delete</a>
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
