<?php
date_default_timezone_set("Asia/Calcutta");
//session_start();
//$myid=$_SESSION['userid'];
include("../connection.php");

//date_default_timezone_set("Asia/Calcutta");
$auto=mysqli_query($conn,"select * from user");
while($load=mysqli_fetch_assoc($auto))
{
  $myid=$load['uname'];


 $query=mysqli_query($conn,"select * from user where uname='$myid'");
$fetch=mysqli_fetch_assoc($query);
$diff_date=$fetch['diff_date'];
$con_date=date('Y-m-d',strtotime($diff_date));

$date=new DateTime();
 $cur_date=$date->format('Y-m-d');
  $set_dt=$date->format('Y-m-d h:i:s');
if($con_date==$cur_date)
{
	//echo '0';

}
else
{
	$update_query=mysqli_query($conn,"update user set diff_date='$set_dt' where uname='$myid'" );
}

function roi_date()
{
	global $conn;
  $myid=$_SESSION['userid'];
  $query=mysqli_query($conn,"select * from user where uname='$myid'");
  $fetch=mysqli_fetch_assoc($query);
 $diff_date=$fetch['diff_date'];
  $con_date=date('Y-m-d',strtotime($diff_date));
 $diff_date1=$fetch['active_date'];
  $activation_date=date('Y-m-d',strtotime($diff_date1)); 
 $date1=date_create($con_date);
 $date2=date_create($activation_date);
$var=date_diff($date2,$date1);
  $a=$var->format("%a");

//............weken date..........//

$str_date=date('Y-m-d',strtotime($diff_date1)); 

$endr_date=date('Y-m-d',strtotime($diff_date));
$start_date=new DateTime($str_date);
$end_date=new DateTime($endr_date);
$wekend=array();
while($start_date<=$end_date)
{
  if($start_date->format('w')==0){
    $wekend[]=$start_date->format('Y-m-d');
  }
  if($start_date->format('w')==6){
    $wekend[]=$start_date->format('Y-m-d');
  }
  $start_date->modify('+1 day');
}
  $discount=count($wekend);
   
   $l1=mysqli_query($conn,"select * from user where uname='$myid' AND status='1'");
   $lf=mysqli_fetch_assoc($l1);
    $lp=$lf['package'];
    if ($lp=='5000') 
        {
          $day=$a*45;
          $weken=$discount*45;
          if($day<$weken)
          {
          return '0';
        }
        else{
            return $day-$weken;
        }
            
        }
         elseif ($lp=='10000') 
        {
            $day=$a*90;
            $weken=$discount*90;
          if($day<$weken)
          {
          return '0';
        }
        else{
            return $day-$weken;
        }
            
        }
         elseif ($lp=='25000') 
        {
           $day=$a*225;
           $weken=$discount*225;
          if($day<$weken)
          {
          return '0';
        }
        else{
            return $day-$weken;
        }
            
        }
         elseif ($lp=='50000') 
        {
            $day=$a*450;
          $weken=$discount*450;
        if($day<$weken)
          {
          return '0';
        }
        else{
            return $day-$weken;
        }
        }
         elseif ($lp=='100000') 
        {
          $day=$a*1125;
          $weken=$discount*1125;
        if($day<$weken)
          {
          return '0';
        }
        else{
            return $day-$weken;
        }
        }
        
        else
        {
            return '0';
        }
       
}
}
?>
