<?php 
include 'connection.php';
if(isset($_POST['login']))
{
	$userid=$_POST['username'];
	$password=$_POST['password'];

	$sql=mysqli_query($conn,"SELECT * FROM admin WHERE userid='$userid' AND password='$password'");
	if (mysqli_affected_rows($conn)) 
	{
		$_SESSION['userid']=$userid;
		echo "<script>window.open('index.php','_self');</script>";
	}
	else
	{
		echo "<script>alert('Password Wrong!!');window.open('login.php','_SELF');</script>";
	}
  
}
?>