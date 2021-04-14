<form action="" method="POST">
    <div class="form-group">
        <label for="inputEmail">Category Name</label>
        <input type="hidden" name="id" value="<?php echo $getData['id']?>">
        <input type="text" class="form-control w-50" id="name" name="name" value="<?php echo $getData['name']?>">
    </div>
   
    <div class="form-group">
        <label>Status </label><br/>
        <label class="form-check-label"><input type="radio"<?php echo $getData['status']==1?"checked":""?>  name="status" value="1" > Published</label>
        <label class="form-check-label"><input type="radio"<?php echo  $getData['status']==0?"checked":""?> name="status" value="0"> Unpublished</label>
    </div>
    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
</form>