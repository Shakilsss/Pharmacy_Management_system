<?php
$conn=mysqli_connect('localhost','root','','pharma');

if(!empty($_GET['medicine'])) {
        $coun_id = $_GET["medicine"];           
	$query ="SELECT * FROM medicines WHERE id IN ($coun_id)";
	$results = mysqli_query($conn, $query);
?>
	
<?php
	foreach($results as $state) {
?>
	<?php echo "Total ".$state["price"]."medicine"; ?>
	<?php echo ", ".$state["expired_date"]; ?>
<?php
	}
}
?>