<div class="row" style="margin-top: 20px !important">
                    <!-- Column -->

    


<style type="text/css">



.card.statistic-box  .card-icon {
    border-radius: 3px;
    background-color: #999;
    margin-top: -24px;
    margin-top: -1.5rem;
    margin-right: 15px;
    float: left;
    height: 50px;
    width: 50px;
}




.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}

.card-stats .card-header+.card-footer {
    /*margin-top: 20px;*/
    border-top: 1px solid #eee;
}

.card.statistic-box .card-header-info .card-icon {
    background: -webkit-linear-gradient(
30deg
,#26c6da,#00acc1);
    background: linear-gradient(
60deg
,#26c6da,#00acc1);
}

</style>


<br>
<div class="col-sm-3 col-md-3  col-lg-3">
<div class="card card-stats statistic-box mb-4 card-hover  shadow bg-info rounded-lg">
<div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0 ">
<div class="card-icon d-flex align-items-center justify-content-center">
<i class="fas fa-pills fa-md" style="color: white"></i>
</div>
<p class="card-category text-uppercase  font-weight-bold text-white">Total Medicine</p>
<h3 class="card-title fs-18 font-weight-bold text-white" ><?php echo mysqli_num_rows($medicine)?> <small></small>
</h3>
</div>
<div class="card-footer p-3">
<div class="stats">
<a href="http://localhost/project/admin/medicine_manage.php" class="warning-link text-white"><i class="fa fa-calendar mr-2"></i>Show Details</a>
</div>
</div>
</div>
</div>


<div class="col-sm-3 col-md-3  col-lg-3">
<div class="card card-stats statistic-box mb-4 card-hover shadow bg-danger rounded-lg">
<div class="card-header card-header-info card-header-icon  position-relative border-0 text-right px-3 py-0">
<div class="card-icon d-flex align-items-center justify-content-center ">
<i class="fas fa-medkit" style="color: white"></i>
</div>
<p class="card-category text-uppercase fs-10 font-weight-bold  text-white">Out of Stock</p>
<h3 class="card-title fs-18 font-weight-bold text-white"><?php echo mysqli_num_rows($result)?> <small></small>
</h3>
</div>
<div class="card-footer p-3">
<div class="stats">
<a href="http://localhost/project/admin/outofstock.php" class="warning-link text-white"><i class="fa fa-calendar mr-2 "></i>Show Details</a>
</div>
</div>
</div>
</div>


<div class="col-sm-3 col-md-3  col-lg-3">
<div class="card card-stats statistic-box mb-4 card-hover shadow bg-info">
<div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
<div class="card-icon d-flex align-items-center justify-content-center">
<i class="fas fa-medkit" style="color: white"></i>
</div>
<p class="card-category text-uppercase fs-10 font-weight-bold text-white">In Stock</p>
<h3 class="card-title fs-18 font-weight-bold text-white"><?php echo mysqli_num_rows($in_stock)?> <small></small>
</h3>
</div>
<div class="card-footer p-3">
<div class="stats">
<a href="http://localhost/project/admin/instock.php" class="warning-link text-white"><i class="fa fa-calendar mr-2"></i>Show Details</a>
</div>
</div>
</div>
</div>


<div class="col-sm-3 col-md-3  col-lg-3">
<div class="card card-stats statistic-box mb-4 card-hover shadow rounded-lg bg-danger">
<div class="card-header card-header-info rounded-lg card-header-icon position-relative border-0 text-right px-3 py-0">
<div class="card-icon d-flex align-items-center justify-content-center">
<i class="far fa-calendar-alt" style="color: white"></i>
</div>
<p class="card-category text-uppercase fs-10 font-weight-bold text-white">Expired Date</p>
<h3 class="card-title fs-18 font-weight-bold text-white"><?php echo mysqli_num_rows($expired_date)?><small></small>
</h3>
</div>
<div class="card-footer p-3">
<div class="stats">
<a href="http://localhost/project/admin/expireddate.php" class="warning-link text-white"><i class="fa fa-calendar"> </i> Show Details</a>
</div>
</div>
</div>
</div>
                   
</div>



<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Reports</h4>
                                        <h5 class="card-subtitle">Overview of Today</h5>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-arrow-right mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">2540</h5>
                                                    <small class="font-light">Export Medicine</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-arrow-left mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">120</h5>
                                                    <small class="font-light">Import Medicine</small>
                                                </div>
                                            </div>
                                 
                                        </div>
                                    </div>


                                    <!-- column -->
<div class="col-lg-4" >


<table class="table table-bordered table-striped table-hover table-sm" style="float: right;">
<tbody><tr>
<th >Index</th>
<th >Amount</th>
</tr>
<tr >
<th>Total Sales</th>
<td >1720.57</td>
</tr>
<tr>
<th >Total Export Price</th>
<td >52102.50</td>
</tr>
<tr>
<th >Total Import Price</th>
<td >1341.32</td>
</tr>
</tbody>

</table>


</div>
<!-- </div> -->
</div>


