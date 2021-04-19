<form action="" method="POST">

        <input type="hidden" name="id" value="<?php echo $getData['id']?>">
    <div class="form-group">
        <label for="inputEmail">Customer Name</label>
        <input type="text" class="form-control w-50" id="name" name="name" value="<?php echo $getData['name']?>">
    </div>

    <div class="form-group">
        <label for="inputEmail">Phone</label>
        <input type="text" class="form-control w-50" id="phone" name="phone" value="<?php echo $getData['phone']?>">
    </div>

    <div class="form-group">
        <label for="inputEmail">Address</label>
        <input type="text" class="form-control w-50" id="address" name="address" value="<?php echo $getData['address']?>">
    </div>

    <div class="form-group">
        <label for="inputEmail">City</label>
        <input type="text" class="form-control w-50" id="city" name="city" value="<?php echo $getData['city']?>">
    </div>

    <div class="form-group">
        <label for="inputEmail">Zip Code</label>
        <input type="text" class="form-control w-50" id="zip" name="zip" value="<?php echo $getData['zip']?>">
    </div>
   


    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
</form>