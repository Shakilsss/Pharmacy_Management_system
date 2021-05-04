<?php
$conn=mysqli_connect('localhost','root','','pharma');
if(!empty($_GET['country_id'])) {
        $coun_id = $_GET["country_id"];           
	$query ="SELECT * FROM medicines WHERE id IN ($coun_id)";
	$results = mysqli_query($conn,$query);

	  $state= mysqli_fetch_assoc($results); 

$quantity= $state["quantity"]; 



}?>