<form action="" method="POST">
    <div class="form-group">
        <label for="inputEmail">Unit Name</label>
        <input type="text" class="form-control w-50" id="name" name="name" placeholder="Unit Name">
    </div>
   
    <div class="form-group">
	    <label>Status </label><br/>
        <label class="form-check-label"><input type="radio" name="status" value="1"> Published</label>
        <label class="form-check-label"><input type="radio" name="status" value="0"> Unpublished</label>
    </div>
    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
</form>