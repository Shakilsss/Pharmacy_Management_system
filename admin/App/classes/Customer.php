<?php

namespace App\classes;

class Customer extends Connection{

	public function addCustomer(){
		extract($_POST);
		
		$sql_check="select* from customers where phone='$phone'";
		$result=mysqli_query($this->conn,$sql_check) or die(mysqli_error($this->conn));
		// $check=mysqli_fetc($result);
		if(mysqli_num_rows($result)>0){
        
        // var_dump($result);
     	 echo '<script>alert("Customer Already Added")</script>';
		}
		else{
		@$status=$_POST['status'];
$sql="insert into customers (name,phone,address,city,zip) values ('$name','$phone','$address','$city','$zip')";	
		$result=mysqli_query($this->conn,$sql);


		if($result){
      	echo '<script>alert("Customer Added Successfully")</script>';

		}

		else 
			die("Error".mysqli_error($this->conn));

			
		}
	}


	

	public function update()
		{
		extract($_POST);
		$sql="update customers set name='$name',phone='$phone',address='$address',city='$city',zip='$zip' where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Customer Updated Successfully")</script>';
			echo '<script>location.replace("/project/admin/customer_manage.php")</script>';
			
			// header("location:");

		}
	}



		public function deleteCustomer($id){
		extract($_GET);
		$sql="delete from customers where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Customer Delete Successfully")</script>';
			echo '<script>location.replace("/project/admin/customer_manage.php")</script>';
		}
	}




}
?>
