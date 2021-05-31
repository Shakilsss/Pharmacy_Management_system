<div class="row">
    <div class="col-12">            
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                    <div class="table-responsive">
                        <table  id="tblCustomers" class="table table-striped table-bordered">
                              <thead>
                                    <?php $i=1;?>
                                          <tr>
                                              <th>Sl_No.</th>
                                              <th>Name</th>
                                              <th>Phone</th>
                                              <th>Address</th>
                                              <th>City</th>
                                              <th>Zip</th>
                                              <th>Action</th>
                                          </tr>
                              </thead>
                        <tbody>
                        <?php while($get=mysqli_fetch_assoc($result)){?>
                              <tr>
                              <td><?php echo $i++?></td>
                              <td><?php echo $get['name']?></td>
                              <td><?php echo $get['phone']?></td>
                              <td><?php echo $get['address']?></td>
                              <td><?php echo $get['city']?></td>
                              <td><?php echo $get['zip']?></td>
                              <td>
<a href="customer_update.php?update&&id=<?php echo $get['id']?>" title="Edit" class="btn btn-info ml-2 btn-sm"><i class="fas fa-edit"></i></a>
<a href="?delete=true&&id=<?php echo $get['id']?>" title="Delete" onclick="return confirm('Are Your Sure to Delete!!!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>




                                                  </td>
                                              </tr> <?php }?>
                                      </tbody>
                              </table>
                        </div>
                        <button id="btnExport" >Export</button>
                  </div>
            </div>
      </div>
</div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    

    <script type="text/javascript">
            $("body").on("click", "#btnExport", function () {
                html2canvas($('#tblCustomers')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 50
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Table.pdf");
                    }
                });
            });

  </script>            

