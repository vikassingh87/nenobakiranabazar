<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
include("../connection.php");
//include('php-includes/check-login.php');
$userid =$_SESSION['userid'];
$capping = 1000;
?>
<?php
//User cliced on join
if(isset($_GET['join_user'])){
	$side='';
	$pin = mysqli_real_escape_string($conn,$_GET['pin']);
	$email = mysqli_real_escape_string($conn,$_GET['email']);
	$mobile = mysqli_real_escape_string($conn,$_GET['mobile']);
	$address = mysqli_real_escape_string($conn,$_GET['address']);
	$account = mysqli_real_escape_string($conn,$_GET['account']);
	$under_userid = mysqli_real_escape_string($conn,$_GET['under_userid']);
	$side = mysqli_real_escape_string($conn,$_GET['side']);
	$password = "123456";
	
	$flag = 0;
	
	if($pin!='' && $email!='' && $mobile!='' && $address!='' && $account!='' && $under_userid!='' && $side!=''){
		//User filled all the fields.
		if(pin_check($pin)){
			//Pin is ok
			if(email_check($email)){
				//Email is ok
				if(!email_check($under_userid)){
					//Under userid is ok
					if(side_check($under_userid,$side)){
						//Side check
						$flag=1;
					}
					elseif(leftside_check($under_userid,$side))
					{
						echo '<script>alert("The side you selected is not available.");</script>';
					}
					elseif(rightside_check($under_userid,$side))
					{
						echo '<script>alert("The side you selected is not available.");</script>';
					}
					else{
						
						$flag=2;
						
						
					}
				}
				else{
					//check under userid
					echo '<script>alert("Invalid Under userid.");</script>';
				}
			}
			else{
				//check email
				echo '<script>alert("This user id already availble.");</script>';
			}
		}
		else{
			//check pin
			echo '<script>alert("Invalid pin");</script>';
		}
	}
	else{
		//check all fields are fill
		echo '<script>alert("Please fill all the fields.");</script>';
	}
	
	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
	if($flag==1){
		
		
		//Insert into User profile
		$query = mysqli_query($conn,"insert into user(`uname`,`password`,`mobile`,`address`,`account`,`under_userid`,`side`) values('$email','$password','$mobile','$address','$account','$under_userid','$side')");
		
		//Insert into Tree
		//So that later on we can view tree.
		$query = mysqli_query($conn,"insert into tree(`uname`) values('$email')");
		
		//Insert to side
		$query = mysqli_query($conn,"update tree set `$side`='$email' where uname='$under_userid'");
		
		//Update pin status to close
		$query = mysqli_query($conn,"update pin_list set status='close' where pin='$pin'");
		
		//Inset into Icome
		// $query = mysqli_query($conn,"insert into income (`userid`) values('$email')");
		echo mysqli_error($conn);
		//This is the main part to join a user\
		//If you will do any mistake here. Then the site will not work.
		
		//Update count and Income.
		$temp_under_userid = $under_userid;
		$temp_side_count = $side.'count'; //leftcount or rightcount
		
		$temp_side = $side;
		$total_count=1;
		$i=1;
		while($total_count>0){
			$i;
			$q = mysqli_query($conn,"select * from tree where uname='$temp_under_userid'");
			$r = mysqli_fetch_array($q);
			$current_temp_side_count = $r[$temp_side_count]+1;
			$temp_under_userid;
			$temp_side_count;
			mysqli_query($conn,"update tree set `$temp_side_count`=$current_temp_side_count where uname='$temp_under_userid'");
			
		//income
			if($temp_under_userid!=""){
				// $income_data = income($temp_under_userid);
				//check capping
				//$income_data['day_bal'];
			
				//change under_userid
				$next_under_userid = getUnderId($temp_under_userid);
				$temp_side = getUnderIdPlace($temp_under_userid);
				$temp_side_count = $temp_side.'count';
				$temp_under_userid = $next_under_userid;	
				
				$i++;
			}
			
			
			//Check for the last user
			if($temp_under_userid==""){
				$total_count=0;
			}
			
		}//Loop
		
		
		
		
		echo mysqli_error($conn);
		
		echo '<script>alert("Testing success.");</script>';
	}

if($flag==2)
{
		
		// left tree
	$sql = "SELECT * FROM tree where uname='$userid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		
       $user_id=$row["user_id"];
	  echo  $left=$row["left"];
	  
		 $right=$row["right"];
 
    }
	echo ",";

} 

//loop



function fact($n)
{
	global $conn;
if ($n !== '')
{ 


$sql1 = "SELECT * FROM tree where uname='$n'";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
		
		
       $left1=$row1["left"];
	   
      echo  $left2=$row1["left"].',';
    }
	
	
	 fact($left1);
	//return $left1;

} 





}
else 
{
	
	
	return 1;
}
}


 echo $all=fact($left);
 
 print_r (explode(" ",$all));




		// end left
		
		echo mysqli_error($conn);
		
		echo '<script>alert("Testing success.");</script>';
	}

	
}
?><!--/join user-->
<?php 
//functions
function pin_check($pin){
	global $conn,$userid;
	
	$query =mysqli_query($conn,"select * from pin_list where pin='$pin' and uname='$userid' and status='open'");
	if(mysqli_num_rows($query)>0){
		return true;
	}
	else{
		return false;
	}
}
function email_check($email){
	global $conn;
	
	$query =mysqli_query($conn,"select * from user where uname='$email'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}
function side_check($email,$side){
	global $conn;
	
	$query =mysqli_query($conn,"select * from tree where uname='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result[$side];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}
//leftside check
function leftside_check($email,$side){
	global $conn;
	
	$query =mysqli_query($conn,"select * from tree where uname='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result['left'];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}
//rightside check
function rightside_check($email,$side){
	global $conn;
	
	$query =mysqli_query($conn,"select * from tree where uname='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result['right'];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}


function tree($userid){
	global $conn;
	$data = array();
	$query = mysqli_query($conn,"select * from tree where uname='$userid'");
	$result = mysqli_fetch_array($query);
	$data['left'] = $result['left'];
	$data['right'] = $result['right'];
	$data['leftcount'] = $result['leftcount'];
	$data['rightcount'] = $result['rightcount'];
	
	return $data;
}
function getUnderId($userid){
	global $conn;
	$query = mysqli_query($conn,"select * from user where uname='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($userid){
	global $conn;
	$query = mysqli_query($conn,"select * from user where uname='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Ideal250</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/lines.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js"></script>
<script src="js/rickshaw.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">
        <div class="graphs">
     	<?php include"header.php"; ?> 
      <div class="col_1">
		    
		 
			
            <div class="clearfix"> </div>
	  </div>
	  <div class="span_11">
		
		<div class="col-md-6 col_5">
		  

</div>
	    
       </div>
       <div class="clearfix"> </div>
    </div>
    <div class="content_bottom">
        <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Upgrade ID</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    	<form method="get">
                            <div class="form-group">
                                
                                <label><b style="color: #00aced;">Pin</b></label>
                                <input type="text" name="pin" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><b style="color: #00aced;">Sponsor id</b></label>
                                
                                <input type="text" name="email" class="form-control"value="" required>
                            </div>
                             <div class="form-group">
                                <label><b style="color: #00aced;">Mobile</b></label>
                                 
                                <input type="text" name="mobile" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label><b style="color: #00aced;">User Name</b></label>
                               
                                <input type="text" name="account" class="form-control" value=" "required>
                            </div>
                            <div class="form-group">
                                <label><b style="color: #00aced;">Under Userid</b></label> 
                               
                                <input type="text" name="under_userid" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label>Side</label><br>
                                <input type="radio" name="side" value="left"> Left
                                <input type="radio" name="side" value="right"> Right
                            </div>
                            
                            <div class="form-group">
                        	<input type="submit" name="join_user" class="btn btn-primary" value="Upgrade">
                        </div>
                        </form>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>

		<div class="clearfix"> </div>
	    </div>
		<?php include "footer.php"; ?>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>
