<?php
include('connection.php');
session_start();
if(isset($_POST['type']) && $_POST['type'] == 'package_update'){
	print_r($_POST);
	extract($_POST);
	//echo "Package : ".$package;
	$top_amount=$package+$amount;
	$id_upgrade=mysqli_query($conn,"UPDATE user SET package='$top_amount' WHERE user_id='$topup'")or die(mysqli_query($conn));
	if(mysqli_affected_rows($conn)){
		echo " id upgraded sucessfully";
	}
	else{
		echo "id upgraded does not sucessfully";
	}
}
?>