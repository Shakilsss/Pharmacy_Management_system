<?php

namespace App\classes;

class Manufacturer extends Connection{

	public function addManufacturer(){
		extract($_POST);
		
		$sql_check="select* from manufacturers where email='$email'";
		$result=mysqli_query($this->conn,$sql_check) or die(mysqli_error($this->conn));
		// $check=mysqli_fetc($result);
		if(mysqli_num_rows($result)>0){
        
        // var_dump($result);
     	 echo '<script>alert("This Email Already Added")</script>';
		}
		else{
		
$sql="insert into manufacturers (name,email,mobile,address,city,zip) values ('$name','$email','$mobile','$address','$city','$zip')";	
		$result=mysqli_query($this->conn,$sql);
		if($result){
      	echo '<script>alert("Manufacturer Added Successfully")</script>';

		}

		else die('error'.mysqli_error($this->conn));
			
		}
	}




	public function update(){
extract($_POST);
$sql="update manufacturers set name='$name', email='$email', mobile='$mobile', address='$address', city='$city', zip='$zip' where id='$id' ";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Manufacturer Updated Successfully")</script>';
			echo '<script>location.replace("/project/admin/manufacturer_manage.php")</script>';
			
			// header("location:");
			// echo $sql;

		}
	}



		public function deleteManufacturer($id){
		extract($_GET);
		$sql="delete from manufacturers where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Manufacturer Delete Successfully")</script>';
			echo '<script>location.replace("/project/admin/manufacturer_manage.php")</script>';
		}
	}
}


?>