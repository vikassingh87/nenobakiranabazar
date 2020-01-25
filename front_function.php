<?php 
session_start();
//Starting to register....//
$a = mt_rand(100000,999999); 
$c = mt_rand(10000,99999);
date_default_timezone_set("Asia/Calcutta");
include('connection.php');
$post_array = array();
if(isset($_POST['submit'])){
	$post_array = $_POST;
    $sponsarid=$_POST['sponsor_id'];
	$sponsarname=$_POST['sponsor_name'];
	$username=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$pancard=$_POST['pancard'];	
	$cf="NKB";
	$uname=$cf.$a;
	$password=$c;
	$status=0;
	$dt=new DateTime();
    $ct= $dt->format('Y-m-d');
    $query=mysqli_query($conn,"SELECT * FROM user WHERE pancard = '$pancard'");
    if(mysqli_affected_rows($conn))
    {
    	$_SESSION['session_flash'] = array(
    									'sponsor_id' => $sponsarid,
    									'sponsor_name' => $sponsarname,
    									'name' => $username,
    									'email' => $email,
    									'mobile' => $mobile,
    									'pancard' => $pancard
    								);
        echo "<script>alert('Pancard is already used.');window.open('signup.php','_SELF');</script>";
    }
    else
    {
    	$sql = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$sponsarid' and status='1' ") or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0){
        	$sql="INSERT INTO user (`sponsor_id`,`sponsor_name`,`user_name`,`email`,`mobile`,`password`,`user_id`,`date_joining`,`status`,`pancard`)VALUES('$sponsarid','$sponsarname','$username','$email','$mobile','$password','$uname','$ct','$status','$pancard')";
        	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        	if($result>0){
        		update_my_team_count($uname);
        		update_my_direct_team_count($uname);
        		$last_id = mysqli_insert_id($conn);
        		$_SESSION['SuperId'] = $last_id;
        		// echo "<script>window.open('panel/welcome.php?id='.$last_id,'_self');</script>";
                check_for_rank($uname);
                check_for_fund($uname); 
        		// header("location:welcome.php");
        		// echo "<script>window.open('panel/index.php','_self');</script>";
        	}
        	else{
        		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        	}
        }
        else{
        	echo "<script>alert('Your Sponsor id is invalid or Blocked..');window.open('index.php','_self');</script>";
        }
    }
}
	
//end register....//
	//start to login ..//
if(isset($_POST['login']))
 //print_r($_SESSION);die;
{
	$userid=$_POST['name'];
	$pass=$_POST['password'];

	$sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$userid' AND password='$pass'");
	if (mysqli_affected_rows($conn)) 
	{
		$_SESSION['userid']=$userid;
		$row=mysqli_fetch_assoc($sql);
		$admin=$row['type'];
		if ($admin=='admin') 
		{
			echo "<script>window.open('admin/dashboard.php','_self');</script>";
		}
		else
		{
			echo "<script>window.open('panel/index.php','_self');</script>";
		}
	}
	else
	{
		echo "<script>alert('Password Wrong!!');window.open('sigin.php','_SELF');</script>";
	}
  
}

	//end to logion..//
?>