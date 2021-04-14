

<form action="" method="POST">
  <!-- <?php $i?> -->
    <div class="row mb-3">
      <div class="col-lg-5">
        <label >Manufacturer Name</label> 
<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $getData['name']?>">
<input type="hidden"  id="id" value="<?php echo $getData['id']?>" name="id">
      </div>
      <div class="col-lg-5">
        <label>Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $getData['email']?>">
      </div>
    </div>

        <div class="row mb-3">
      <div class="col-lg-5">
        <label >Phone</label>
        <input type="text" value="<?php echo $getData['mobile']?>" class="form-control" id="phone"name="mobile">
        
      </div>
      <div class="col-lg-5">
        <label>Address</label>
        <input type="text" value="<?php echo $getData['address']?>" class="form-control" id="city" name="address">

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-5">
        <label >City</label>
        <input type="text" class="form-control" id="zip" name="city" value="<?php echo $getData['city']?>">

      </div>
      <div class="col-lg-5">
        <label >Zip</label>
        <input type="text" class="form-control"value="<?php echo $getData['zip']?>"  name="zip">
      </div>
    </div>


    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
  </form>