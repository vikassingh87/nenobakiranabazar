<?php
//session_start();
include('../connection.php');
 $inc=$_SESSION['income'];
$myid=  $_SESSION["userid"];



$sql=mysqli_query($conn,"SELECT * from working_income where user_id='$myid'");
if (mysqli_affected_rows($conn)) 
{
	$update=mysqli_query($conn,"UPDATE working_income set income='$inc' where user_id='$myid'");
}
else
{
$insert="INSERT INTO working_income(user_id,income) VALUES('$myid','$inc')";
$query=mysqli_query($conn,$insert);
}
?>