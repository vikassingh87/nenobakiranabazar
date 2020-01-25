<?php
//session_start();
include('../connection.php');
  $inc=roi_date();
 $status=0;
$myid=  $_SESSION["userid"];
$check="SELECT * FROM user where uname='$myid'";
$query=mysqli_query($conn,$check);
$fetch=mysqli_fetch_assoc($query);
 $date=$fetch['active_date'];
 $active_date=date('Y-m-d',strtotime($date));
 $cur_day=date('Y-m-d');
 $date1=date_create($active_date);
 $date2=date_create($cur_day);
  $diff=date_diff($date1,$date2);
   $date_count=$diff->format("%a");
  $sql=mysqli_query($conn,"SELECT * from user where uname='$myid'");
  $fetch=mysqli_fetch_assoc($sql);
  $package=$fetch['package'];
  if($package=='Cr') 
  {
  	
  }
  else
  {
  	$condion="SELECT * FROM roi_income where user_id='$myid' order by id desc limit 1";
  	$res=mysqli_query($conn,$condion);
 	 $fetch_day=mysqli_fetch_assoc($res);
 	 $day=$fetch_day['day'];
 	 if($date_count==$day)
  	 {

  	 }
   	 else
     {
  		if($date_count==30||$date_count==45||$date_count==60||$date_count==75||$date_count==90||$date_count==105||$date_count==120||$date_count==135||$date_count==150||$date_count==165||$date_count==180||$date_count==195)
  		{
    	$insert="INSERT INTO roi_income(user_id,income,day,status) values('$myid','$inc','$date_count','$status')";
   		 $quer=mysqli_query($conn,$insert);	
 	 	}
  		else
  		{
  			
 		}
  	 }	
   }

// $sql=mysqli_query($conn,"SELECT * from working_income where user_id='$myid'");
// if (mysqli_affected_rows($conn)) 
// {
// 	$update=mysqli_query($conn,"UPDATE working_income set income='$inc' where user_id='$myid'");
// }
// else
// {
// $insert="INSERT INTO working_income(user_id,income) VALUES('$myid','$inc')";
// $query=mysqli_query($conn,$insert);
//}
?>