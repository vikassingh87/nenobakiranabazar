<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nenobakirana";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
include_once('function.php');
/*echo "<h1>Level Payout </h1>";
calculate_level_payout('NKB459344');
echo "<h1>Referral Bonus Payout </h1>";
calculate_referral_bonus_payout('NKB459344');
echo "<h1>Direct Referral Bonus Payout </h1>";
calculate_direct_referral_bonus_payout('NKB459344');
echo "<h1>Performance Bonus Payout </h1>";
calculate_performance_bonus_payout('NKB459344');*/
?>