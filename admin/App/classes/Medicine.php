<?php

namespace App\classes;

class Medicine extends Connection{

	public function addMedicine(){
		extract($_POST);
		
		$sql_check="select* from medicine where name='$name'";
		$result=mysqli_query($this->conn,$sql_check) or die(mysqli_error($this->conn));
		// $check=mysqli_fetc($result);
		if(mysqli_num_rows($result)>0){
        
        // var_dump($result);
     	 echo '<script>alert("Medicine Already Added")</script>';
		}
		else{
		@$status=$_POST['status'];
$sql="insert into medicine (name,code,category_id,unit_id,manufacturer,strength,shelf,expired_date,quantity,description,manufacturer_price,price,status) values ('$name','$code','$category_id','$unit_id','$manufacturer','$strength','$shelf','$expired_date','$quantity','$description','$manufacturer_price','$price','$status')";	
		$result=mysqli_query($this->conn,$sql);
		if($result){
      	echo '<script>alert("Medicine Added Successfully")</script>';

		}

		else 
			die("Error".mysqli_error($this->conn));

			
		}
	}


		public function unpublishedMedicine($unpublished_id){
		extract($_GET);
		$sql="update medicine set status='0' where id='$unpublished_id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			// header("location:/project/admin/category_manage.php");
			echo '<script>alert("Medicine Unpublished")</script>';
			echo '<script>location.replace("/project/admin/medicine_manage.php")</script>';
		}
	}


		public function publishedMedicine($published_id){
		extract($_GET);
		$sql="update medicine set status='1' where id='$published_id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Medicine Published")</script>';
			echo '<script>location.replace("/project/admin/medicine_manage.php")</script>';
		}
	}

	public function update()
		{
		extract($_POST);
		$sql="update medicine set name='$name',code='$code',category_id='$category_id',unit_id='$unit_id',manufacturer='$manufacturer',strength='$strength',shelf='$shelf',expired_date='$expired_date',quantity='$quantity',description='$description',manufacturer_price='$manufacturer_price',price='$price',status='$status' where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Medicine Updated Successfully")</script>';
			echo '<script>location.replace("/project/admin/medicine_manage.php")</script>';
			
			// header("location:");

		}
	}



		public function deleteMedicine($id){
		extract($_GET);
		$sql="delete from medicine where id='$id'";
		$result=mysqli_query($this->conn,$sql);
		if($result)
		{
			echo '<script>alert("Medicine Delete Successfully")</script>';
			echo '<script>location.replace("/project/admin/medicine_manage.php")</script>';
		}
	}




}
?>
