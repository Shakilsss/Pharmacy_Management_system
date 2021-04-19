<?php

namespace App\classes;

class Category extends Connection{

	public function addCategory(){
		extract($_POST);
		
		$sql_check="select* from categories where name='$name'";
		$result=mysqli_query($this->conn,$sql_check) or die(mysqli_error($this->conn));
		// $check=mysqli_fetc($result);
		if(mysqli_num_rows($result)>0){
        
        // var_dump($result);
     	 echo '<script>alert("Category Already Added")</script>';
		}
		else{
		$sql="insert into categories (name,status) values ('$name','$status')";	
		$result=mysqli_query($this->conn,$sql);
		if($result){
      	echo '<script>alert("Category Added Successfully")</script>';

		}
			
		}
	}


	public function unpublishedCategory($unpublished_id){
		extract($_GET);
		$sql="update categories set status='0' where id='$unpublished_id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			// header("location:/project/admin/category_manage.php");
			echo '<script>alert("Category Unpublished")</script>';
			echo '<script>location.replace("/project/admin/category_manage.php")</script>';
		}
	}


		public function publishedCategory($published_id){
		extract($_GET);
		$sql="update categories set status='1' where id='$published_id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Category Published")</script>';
			echo '<script>location.replace("/project/admin/category_manage.php")</script>';
		}
	}




	public function update()
		{
		extract($_POST);
		$sql="update categories set name='$name', status='$status' where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Category Updated Successfully")</script>';
			echo '<script>location.replace("/project/admin/category_manage.php")</script>';
			
			// header("location:");

		}
	}



		public function deleteCategory($id){
		extract($_GET);
		$sql="delete from categories where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Category Delete Successfully")</script>';
			echo '<script>location.replace("/project/admin/category_manage.php")</script>';
		}
	}
}


?>