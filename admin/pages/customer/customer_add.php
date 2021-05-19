<form action="" method="POST">
  <!-- <?php $i?> -->
    <div class="row mb-3">
      <div class="col-lg-5">
       <label >Customer Name</label> <input type="text" class="form-control" id="code" placeholder="Customer Name" name="name" required>
      </div>
      <div class="col-lg-5">
        <label for="uname">Phone</label>
        <input type="text" class="form-control" id="name" placeholder="Phone" name="phone" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-5">
       <label >Address</label> <input type="text" required class="form-control" id="address" placeholder="Address" name="address"  >
      </div>
      <div class="col-lg-5">
        <label>City</label>
        <input type="text" class="form-control" id="city" placeholder="city" name="city">
      </div>
    </div>

    <div class="row mb-3">

      <div class="col-lg-5">
        <label >Zip Code</label>
        <input type="text" class="form-control" placeholder="Zip Code" name="zip">
 </div>
    

    </div>
    

    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
  </form>