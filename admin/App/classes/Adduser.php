<?php
namespace App\classes;

class Adduser extends Connection{

	public function adduser(){
		extract($_POST);
		$sql= "insert into users (name,email,phone,password) values ('$name','$email','$phone','$email')";
		$adduser=mysqli_query($this->conn,$sql);
		if($adduser){
        
      echo '<script>alert("User Added Successfully")</script>';
		}
		else{

			return $msg;
		}

	}
}






?>