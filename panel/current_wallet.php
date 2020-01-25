
<?php

include('../connection.php');
$userid = $_SESSION["userid"];


$as = mysqli_query($conn, "select * from working_income where user_id='$userid'");
$gh = mysqli_fetch_assoc($as);

$d = $gh['income'];

$income = mysqli_query($conn, "select * from withdrawal_list where uname='$userid' ORDER by id desc");
$inc_f  = mysqli_fetch_assoc($income);
$c      = $inc_f['amount'];

$sqld = mysqli_query($conn, "SELECT SUM(amount) as total FROM withdrawal_list WHERE uname= '$userid'") or die(mysqli_error($conn));
$rec1           = mysqli_fetch_assoc($sqld);
$ab             = $rec1['total'];
$current_wallet = $d - $ab;

?>