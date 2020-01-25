<?php 
$a = mt_rand(100000,999999); 
$c = mt_rand(10000,99999);
session_start();
 date_default_timezone_set("Asia/Calcutta");
include('connection.php');
$post_array = array();
if(isset($_POST['submit']))
{
	$post_array = $_POST;
	$sponsarid=$_POST['sponsar_id'];
	$sponsarname=$_POST['sponsar_name'];
	$username=$_POST['name'];
	$email=$_POST['email'];
	$type=$_POST['type'];
	$mobile=$_POST['mobile'];
	//$password=$_POST['password'];
	$cf="BC";
	$uname=$cf.$a;
	$password=$c;
	$status=0;
	$dt=new DateTime();
    $ct= $dt->format('Y-m-d');
	$sql = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$sponsarid'");
		if(mysqli_affected_rows($conn)>0){
		   	$sql="INSERT INTO user (`sponsar_id`,`sponsar_name`,`name`,`email`,`state`,`mobile`,`password`,`user_id`,`date`,`status`)VALUES('$sponsarid','$sponsarname','$username','$email','$type','$mobile','$password','$uname','$ct','$status')";
			$result=mysqli_query($conn,$sql);
			if($result>0)
			{
			 $last_id = mysqli_insert_id($conn);
			echo	$_SESSION['SuperId'] = $last_id;
			/* Send text message to user */
				//  $to_mobile = $mobile;
				//  $text = " Congratulation! ".$username." You are now registered successfully with BestCryptocoin.Your userid is ".$uname." and Your password is ".$password." Best of luck visit us   http://bestcryptocoin.uk/";
				// $post = array(
				// 	'username'=>'BCCOIN',
				//  	'password'=>'digi1234',
				//  	'from' => 'BCCOIN',
				//  	'to'=>$to_mobile,
				//  	'text'=>$text
				//  );
				// $url = 'http://49.50.67.32/smsapi/httpapi.jsp?'.http_build_query($post);
				// $ch = curl_init();
				//  // set URL and other appropriate options
				//  curl_setopt($ch, CURLOPT_URL, $url);
				// curl_setopt($ch, CURLOPT_HEADER, 0);
				//  curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
				//  //grab URL and pass it to the browser
			 //    curl_exec($ch);

				//  //close cURL resource, and free up system resources
				//  curl_close($ch);
				/*-----------------------------*/
                    
                    // mail to customer
                    // $to = $email;
                    // $subject = "Bestcryptocoin";
                    // $txt = " Congratulation! ".$username." You are now registered successfully with BestCryptocoin.Your userid is ".$uname." and Your password is ".$password." Best of luck visit us   http://bestcryptocoin.uk/
				
                    //     Thanks ";
                    // $headers = "From: bestcryptocoin.uk@gmail.com" ;
    
                    // mail($to,$subject,$txt,$headers); 

				//header("location:sigin.php");
				echo "<script>window.open('panel/user_profile.php?id='.$last_id,'_self');</script>";

			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);

			}
		}
		else{
			echo "<script>alert('Sponser id or name is not valid..');window.open('index.php','_self');</script>";
		}
	}
	

?>