<?php 
//session_start();
    include_once('../connection.php');
    $userid=$_SESSION["userid"];
    $sql=mysqli_query($conn,"SELECT COUNT(*) as count  FROM user where sponsor_id='$userid'")or die(mysqli_error($conn));
    $sql_fetch=mysqli_fetch_assoc($sql);
    $count=$sql_fetch['count'];



 
function Working_income()
 {
    $userid=$_SESSION["userid"];
	global $conn;
	$sql_count=mysqli_query($conn,"SELECT SUM(income) as sum FROM working_new_income where sponsor_id='$userid'")or die(mysqli_error($conn));
	$sql_record=mysqli_fetch_assoc($sql_count)or die(mysqli_error($conn));
	$user_income=$sql_record['sum'];
	return $user_income;
 }
   
?>
