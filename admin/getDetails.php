<?php
include "config.php";

$request = $_POST['request'];   // request

// Get username list
if($request == 1){
    $search = $_POST['search'];

    $query = "SELECT * FROM medicines WHERE names like'%".$search."%' && expired_date > NOW()";
    $result = mysqli_query($con,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['id'],"label"=>$row['names']);
    }

    // encoding array to json format
    echo json_encode($response);
    exit;
}

// Get details
if($request == 2){
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM medicines WHERE id=".$userid;

    $result = mysqli_query($con,$sql);

    $users_arr = array();

    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['id'];
        $quantity = $row['quantity'];
        $expired_date = $row['expired_date'];
        // $price = $row['price'];

        $users_arr[] = array("id" => $userid,"quantity" =>$quantity, "expired_date" =>$expired_date);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
