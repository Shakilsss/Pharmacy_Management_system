<?php

// Get the user id
$medicine = $_REQUEST['medicine'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "pharma");

if ($medicine !="") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT* FROM medicines WHERE names like '%$medicine%' ");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$quantity = $row["quantity"];
	$expired_date = $row["expired_date"];
	$unit= $row["unit_id"];


}

// else echo '<script>alert("Customer not found")</script>';

// Store it in a array
$result = array("$quantity","$expired_date" ,"$unit");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>