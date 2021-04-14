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
                        <?php while($get=mysqli_fetch_assoc($manage_category)){?>
                              <tr>
                              <td><?php echo $i++?></td>
                              <td><?php echo $get['name']?></td>
                              <td><?php echo $get['status']==1?"Published":"Unpublished" ?></td>
                              <td>

<?php if($get['status']==1){
echo '<a href="?unpublished_id='.$get['id'].'">'.'<button type="button" class="btn btn-success 
btn-sm">Published</button></a>';
}
else{
echo '<a href="?published_id='.$get['id'].'">'.'<button type="button" class="btn btn-warning
btn-sm">Unpublished</button></a>';}?>
<a href="category_update.php?update&&id=<?php echo $get['id']?>" class="btn btn-info ml-2 btn-sm">Edit</a>
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
            

