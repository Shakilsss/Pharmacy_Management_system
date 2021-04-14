<?php
namespace App\classes;

class Manageuser extends Connection{

	public function manageuser(){
		extract($_POST);
		$sql= "select* from user";
		$manageuser=mysqli_query($this->conn,$sql);

	}
}






?>