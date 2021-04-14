                <div class="row">
                    <!-- Column -->

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fa fa-pills"></i></h1>
                                <h5 class="text-white">Total Medicine</h5>
                                <h5 class="text-white"><?php echo mysqli_num_rows($medicine)?></h5>
                                <h6 ><a class="text-white" href="medicine_manage.php">Show Details</a></h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-medkit"></i></h1>
                                <h5 class="text-white">Out of Stock</h5>
                                <h5 class="text-white"><?php echo mysqli_num_rows($result)?></h5>
                                <h6 ><a class="text-white" href="outofstock.php">Show Details</a></h6>
                                

                                

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fa fa-medkit"></i></h1>
                                <h5 class="text-white">In Stock</h5>
                                <h5 class="text-white"><?php echo mysqli_num_rows($in_stock)?></h5>
                                <h6 ><a class="text-white" href="instock.php">Show Details</a></h6>

                            </div>
                        </div>
                    </div>


                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-calendar-times"></i></h1>
                                <h5 class="text-white">Expired Date</h5>
                                <h5 class="text-white"><?php echo mysqli_num_rows($expired_date)?></h5>
                                <h6 ><a class="text-white" href="expireddate.php">Show Details</a></h6>

                            </div>
                        </div>
                    </div>

                   
                </div>
