<?php
namespace App\classes;
class Connection{

	public $conn;

	public function __construct(){
		$conn=$this->conn=mysqli_connect('localhost','root','','pharma');

	}
}

$conn= new Connection;

?>