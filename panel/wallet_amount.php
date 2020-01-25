<?php 
//session_start();
$userid = $_SESSION["userid"];
include('../connection.php');
$date_time=new DateTime();
$current_date= $date_time->format('Y-m-d');

function Wallet_amount()
{
 global $conn;
 $userid = $_SESSION["userid"];
 $sql_sum=mysqli_query($conn,"SELECT SUM(income) as total1 FROM working_new_income WHERE sponsor_id='$userid'"); 
               $sql_fetch=mysqli_fetch_assoc($sql_sum);
                $fetch_total_working_income=$sql_fetch['total1'];
   
   
                $sql_withdrawal_list = mysqli_query($conn,"SELECT SUM(amount) as total FROM withdrawal_list WHERE uname= '$userid'") or die(mysqli_error($conn));
                  $rec1=mysqli_fetch_assoc($sql_withdrawal_list);
                  $withdrawal_amount= $rec1['total'];
                   $wallet=$fetch_total_working_income-$withdrawal_amount;
                   return $wallet;

}
?>