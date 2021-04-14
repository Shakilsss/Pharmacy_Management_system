<?php

namespace App\classes;

class Unit extends Connection{

	public function addUnit(){
		extract($_POST);
		
		$sql_check="select* from unit where name='$name'";
		$result=mysqli_query($this->conn,$sql_check) or die(mysqli_error($this->conn));
		// $check=mysqli_fetc($result);
		if(mysqli_num_rows($result)>0){
        
        // var_dump($result);
     	 // echo $result; 
     	 echo '<script>alert("Unit Already Added")</script>';
		}
		else{
		$sql="insert into unit (name,status) values ('$name','$status')";	
		$result=mysqli_query($this->conn,$sql);
		if($result){
      	echo '<script>alert("Unit Added Successfully")</script>';
			// echo $sql;

		}
			
		}
	}


	public function unpublishedUnit($unpublished_id){
		extract($_GET);
		$sql="update unit set status='0' where id='$unpublished_id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Unit Unpublished")</script>';
			echo '<script>location.replace("/project/admin/unit_manage.php")</script>';

		}
	}


		public function publishedUnit($published_id){
		extract($_GET);
		$sql="update unit set status='1' where id='$published_id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Unit Published")</script>';
			echo '<script>location.replace("/project/admin/unit_manage.php")</script>';

		}
	}


	public function update()
		{
		extract($_POST);
		$sql="update unit set name='$name', status='$status' where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Unit Updated Successfully")</script>';
			echo '<script>location.replace("/project/admin/unit_manage.php")</script>';
			
			// header("location:");

		}
	}




		public function deleteUnit($id){
		extract($_GET);
		$sql="delete from unit where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{   
			echo '<script>alert("Unit Delete Successfully")</script>';
			echo '<script>location.replace("/project/admin/unit_manage.php")</script>';
			// header("location:/project/admin/unit_manage.php");
		}
	}
}


?>