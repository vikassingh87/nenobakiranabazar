<?php 
$host_name = "localhost";
$username = "root";
$password = "";
$db_name = "nenobakirana";
$conn = mysqli_connect($host_name,$username,$password,$db_name);
if(isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=="127.0.0.1"  || $_SERVER['HTTP_HOST']=="192.168.1.1")){
	$mailsetting = array(
    	"Host"              =>  "smtp.gmail.com",
    	"Port"              =>  587,
    	"SMTPSecure"        =>  "tls",
    	"SMTPAuth"          =>  true,
    	"gmail_username"    =>  "iicsvikasbca@gmail.com",
    	"gmail_password"    =>  "1234vcky",
    	"defaultfromemail"  =>  "iicsvikasbca@gmail.com",
    	"defaultfromname"   =>  "Nenobakirana",
    	"defaulttoemail"    =>  "iicsvikasbca@gmail.com",
    	"defaulttoname"     =>  "Nenobakirana",
    	"defaultccemail"    =>  "iicsvikasbca@gmail.com",
    	"defaultccname"     =>  "Nenobakirana"
	);
}
else{
	$mailsetting = array(
    	"Host"              =>  "smtp.gmail.com",
    	"Port"              =>  587,
    	"SMTPSecure"        =>  "tls",
    	"SMTPAuth"          =>  true,
    	"gmail_username"    =>  "iicsvikasbca@gmail.com",
    	"gmail_password"    =>  "1234vcky",
    	"defaultfromemail"  =>  "iicsvikasbca@gmail.com",
    	"defaultfromname"   =>  "Nenobakirana",
    	"defaulttoemail"    =>  "iicsvikasbca@gmail.com",
    	"defaulttoname"     =>  "Nenobakirana",
    	"defaultccemail"    =>  "iicsvikasbca@gmail.com",
    	"defaultccname"     =>  "Nenobakirana"
	);
}

include('function.php');
/*echo "<h1>Level Payout </h1>";
calculate_level_payout('NKB459344');
echo "<h1>Referral Bonus Payout </h1>";
calculate_referral_bonus_payout('NKB459344');
echo "<h1>Direct Referral Bonus Payout </h1>";
calculate_direct_referral_bonus_payout('NKB459344');
echo "<h1>Performance Bonus Payout </h1>";
calculate_performance_bonus_payout('NKB459344');*/
