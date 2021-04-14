<form action="" method="post" >
    <div class="form-group">
        <label for="inputEmail">Category Name</label>
        <input type="text" class="form-control w-50" id="name" name="name" placeholder="Category Name">
    </div>
      
    <div class="form-group">
	    <label>Status </label><br/>
        <label class="form-check-label"><input type="radio" name="status" id="status" value="1"> Published</label>
        <label class="form-check-label"><input type="radio" name="status" id="status" value="0"> Unpublished</label>
    </div>

    <button type="submit" name="btn" class="btn btn-primary">Submit</button>
</form>

