<?php

// Get the user id
$user_id = $_REQUEST['user_id'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "pharma");

if ($user_id !="") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT* FROM customers WHERE name like '%$user_id%'|| phone = '$user_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$name = $row["name"];

	// Get the first name
	$phone = $row["phone"];
	$address = $row["address"];
	$city = $row["city"];
	$zip = $row["zip"];
}

// else echo '<script>alert("Customer not found")</script>';

// Store it in a array
$result = array("$name", "$phone","$address","$city","$zip");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
