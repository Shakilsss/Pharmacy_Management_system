<form action="" method="POST">
  <!-- <?php $i?> -->
    <div class="row mb-3">
      <div class="col-lg-5">
       <label >Medicine Code</label> <input type="text" class="form-control" id="code" placeholder="Code" name="code" value="<?php echo $getData['code']?>" >
       <input type="hidden" name="id" value="<?php echo $getData['id']?>">
      </div>
      <div class="col-lg-5">
        <label for="uname">Medicine Name</label>
        <input type="text" class="form-control" id="name" value="<?php echo $getData['names']?>" name="name">
      </div>
    </div>

        <div class="row mb-3">
      <div class="col-lg-5">
       <label >Strength</label> <input type="text" class="form-control" id="strength" placeholder="Strength" name="strength" value="<?php echo $getData['strength']?>" >
      </div>
      <div class="col-lg-5">
        <label>Shelf</label>
        <input type="text" class="form-control" id="shelf" placeholder="Shelf" name="shelf" value="<?php echo $getData['shelf']?>">
      </div>
    </div>


        <div class="row mb-3">
      <div class="col-lg-5">
        <label >Category</label>
        <select class="form-control" style="height: 35px" name="category">
        <option>Choose Category</option>
        <?php while($category=mysqli_fetch_assoc($get_category)){?>
        <option <?php echo $getData['category']==$category['name'] ? 'SELECTED':''?>><?php echo $category['name'];?></option>
        <?php }?>
      </select>
      </div>
      <div class="col-lg-5">
        <label for="uname">Unit</label>
        <select class="form-control" style="height: 35px" name="unit">
        <option >Choose Unit</option>
       <?php while($unit=mysqli_fetch_assoc($get_unit)){?>
        <option <?php echo $getData['unit']==$unit['name'] ? 'SELECTED':''?>><?php echo $unit['name'];?></option>
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
        <option <?php echo $getData['manufacturer']==$get['name']?'SELECTED':''?>><?php echo $get['name'];?></option>
        <?php }?>
      </select>
      </div>
      <div class="col-lg-5">
        <label >Expried Date</label>
     <input type="date" class="form-control"  name="expired_date" value="<?php echo $getData['expired_date']?>">
      </div>
    </div>

    <div class="row mb-3">

      <div class="col-lg-5">
        <label >Quantity</label>
        <input type="text" class="form-control" value="<?php echo $getData['quantity']?>" name="quantity">
      </div>

            <div class="col-lg-5">
        <label >Description</label>
        <textarea  type="text" class="form-control"  name="description" ><?php echo $getData['description']?></textarea>
      </div>
    </div>

    <div class="row mb-3">

      <div class="col-lg-5">
        <label >Manufacturer Price</label>
        <input type="text" class="form-control" value="<?php echo $getData['manufacturer_price']?>" name="manufacturer_price">
      </div>

    <div class="col-lg-5">
        <label >Price</label>
        <input type="text" class="form-control" value="<?php echo $getData['price']?>" name="price">
      </div>
    </div>
    
    <div class="form-group">
      <label>Status </label><br/>
        <label class="form-check-label"><input type="radio" name="status" id="status" value="1"<?php echo $getData['status']=='1'?'checked':'';?>> Active</label>
        <label class="form-check-label"><input type="radio" name="status" id="status" value="0" <?php echo $getData['status']=='0'?'checked':''?>> Inactive</label>
    </div>
    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
  </form>