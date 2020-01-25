<?php
session_start();
require('connection.php');
$userid = mysqli_real_escape_string($conn,$_POST['userid']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$query = mysqli_query($conn,"select * from admin where userid='$userid' and password='$password'");
if(mysqli_num_rows($query)>0){
	$_SESSION['userid'] = $userid;
	$_SESSION['id'] = session_id();
	$_SESSION['login_type'] = "admin";
	
	echo '<script>window.location.assign("dashboard.php");</script>';
	
}
else{
	echo '<script>alert("Email id or password is worng.");window.location.assign("index.php");</script>';
}

?>