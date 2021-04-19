<?php
namespace App\classes;

class Login extends Connection{

public function adminLogin(){
extract($_POST);
$sql="select* from users where email='$email' && password='$password'";
$getAdminEP=mysqli_query($this->conn,$sql);

if($getAdminEP)
{

	$admin=mysqli_fetch_assoc($getAdminEP);
	if($admin)
	{
		session_start();
                $_SESSION['id'] = $admin['id'];
                $_SESSION['name'] = $admin['name'];
                $_SESSION['email'] = $admin['email'];
         header('location:/project/admin/index.php');       
	}

	else
	{
		echo "<script>alert('Error!!! Wrong Email or Password')</script>";
	}
}



}

}

?>