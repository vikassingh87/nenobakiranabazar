<?php 
session_start();
include('../connection.php');
$userid=$_SESSION["userid"];
//echo  New_working_income();

function New_working_income()
{
	global $conn;
	$userid=$_SESSION["userid"];
	$working_income=mysqli_query($conn,"SELECT SUM(income) as total from working_new_income where sponsor_id='$userid'")or die(mysqli_error($conn));
	$fetch_working_income=mysqli_fetch_assoc($working_income);
	$total=$fetch_working_income['total'];
	return $total;
}
 

?>