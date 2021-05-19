
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><title>Admin Dashboard</title>
    <?php include'includes/head.php';?> 
</head>
<body> 
<?php include 'includes/loader.php';?>  
    <div id="main-wrapper">    
<?php include 'includes/header.php'; ?>    
<?php include 'includes/aside.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Sales Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">


<div class="row">
    <div class="col-12">            
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manufacturer List</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered table-sm">
                           
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
                        
                      </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>
            



    </div><?php include 'includes/footer.php';?> </div></div>

<?php include 'includes/js.php'?>
</body>
</html>