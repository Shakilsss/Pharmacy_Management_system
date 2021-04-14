<form action="" method="POST">
  <!-- <?php $i?> -->
    <div class="row mb-3">
      <div class="col-lg-5">
       <label >Medicine Code</label> <input type="text" class="form-control" id="code" placeholder="Code" name="code" value="MED-<?php echo(rand(1,1000))?>" >
      </div>
      <div class="col-lg-5">
        <label for="uname">Medicine Name</label>
        <input type="text" class="form-control" id="name" placeholder="Medicine Name" name="name" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-5">
       <label >Strength</label> <input type="text" required class="form-control" id="strength" placeholder="Strength" name="strength"  >
      </div>
      <div class="col-lg-5">
        <label>Shelf</label>
        <input type="text" class="form-control" id="shelf" placeholder="Shelf" name="shelf">
      </div>
    </div>


    <div class="row mb-3">
      <div class="col-lg-5">
        <label >Category</label>
        <select class="form-control" style="height: 35px" name="category">
        <option>Choose Category</option>
        <?php while($category=mysqli_fetch_assoc($get_category)){?>
        <option ><?php echo $category['name'];?></option>
        <?php }?>
      </select>
      </div>
      <div class="col-lg-5">
        <label for="uname">Unit</label>
        <select class="form-control" style="height: 35px" name="unit">
        <option >Choose Unit</option>
       <?php while($unit=mysqli_fetch_assoc($get_unit)){?>
        <option ><?php echo $unit['name'];?></option>
        <?php }?>
      </select>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-5">
        <label >Manufacturer</label>
        <select class="form-control" style="height: 35px" name="manufacturer">
        <option>Manufacturer List</option>
        <?php while($get=mysqli_fetch_assoc($get_manufacturer)){?>
        <option ><?php echo $get['name'];?></option>
        <?php }?>
      </select>
      </div>
      <div class="col-lg-5">
        <label >Expried Date</label>
     <input type="date" class="form-control"  name="expired_date">
      </div>
    </div>

    <div class="row mb-3">

      <div class="col-lg-5">
        <label >Quantity</label>
        <input type="text" class="form-control" placeholder="Quantity" name="quantity">
      </div>

            <div class="col-lg-5">
        <label >Description</label>
        <textarea  type="text" class="form-control" placeholder="Enter Description" name="description"></textarea>
      </div>
    </div>

    <div class="row mb-3">

      <div class="col-lg-5">
        <label >Manufacturer Price</label>
        <input type="text" class="form-control" placeholder="Enter Manufacturer Price" name="manufacturer_price">
      </div>

    <div class="col-lg-5">
        <label >Price</label>
        <input type="text" class="form-control" placeholder="Enter Price" name="price">
      </div>
    </div>
    
    <div class="form-group">
      <label>Status </label><br/>
        <label class="form-check-label"><input type="radio" name="status" id="status" value="1"> Published</label>
        <label class="form-check-label"><input type="radio" name="status" id="status" value="0"> Unpublished</label>
    </div>
    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
  </form>