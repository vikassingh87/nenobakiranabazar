<?php 
date_default_timezone_set("Asia/Calcutta");
session_start();
include("../connection.php");
$myid=$_SESSION['userid'];
$pin='';
if (isset($_GET['pin'])) 
{
    $pin=$_GET['pin'];
}
if(isset($_GET['uname'])&&isset($_GET['sponsarid']))
{
	$uname=$_GET['uname'];
	$sponsarid=$_GET['sponsarid'];
	
}
if(isset($_POST['active']))
{	
	$pin=$_POST['pin'];
    $package='2100';
    $uname=$_POST['uname'];
    $user_info = get_user_info($uname);
    if(empty($user_info)){
        echo '<script>alert("Invalid User ID");window.open("view.php","_self");</script>';
        die;
    }
	$stock=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$uname'") or die(mysqli_error($conn));
	
// 	if (mysqli_num_rows($stock)) 
// 	{
// 	     echo '<script>alert("Invalid Userid");window.open("view.php","_self");</script>';
// 	}
// 	else
// 	{
    	$result=mysqli_fetch_assoc($stock);
    	$mobile=$result['mobile'];
    	$status=$result['status'];
    	
    	if($status==1)
    	{
    	    echo '<script>alert("Userid already activated");window.open("view.php","_self");</script>';
    	}
        else
        {
            ///.....pin/......//
            $query =mysqli_query($conn,"select * from pin_list where pin='$pin' and uname='$myid' and status='open'");
            if(mysqli_num_rows($query)>0){
    // curentdate
    $date=new DateTime();
    $set_dt=$date->format('Y-m-d h:i:s');
    //   currentdate end
    $query = mysqli_query($conn,"update user set `package`='$package',`active_date`='$set_dt',`diff_date`='$set_dt'  where user_id='$uname'");
    
    //Update pin status to close
    
    $query = mysqli_query($conn,"update pin_list set status='close' where pin='$pin'");
    $query = mysqli_query($conn,"update user set `status`='1' where user_id='$uname'");
    
    calculate_level_payout($uname);
    calculate_referral_bonus_payout($uname);
    calculate_direct_referral_bonus_payout($uname);
    calculate_performance_bonus_payout($uname);
    echo '<script>alert("Activation Successfully");window.open("index.php","_self");</script>';
    }
            else
            {
                echo '<script>alert("Invalid pin");</script>';
            }
        }
            ///....endpin....//
//	}
	
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Nenoba Kirana Bazar</title>
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
     	<?php //include"header.php"; ?> 
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
                        <center><h1 class="page-header">Activate ID</h1></center>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4"></div>

                	<div class="col-lg-4" style="border: 1px solid black; border-radius: 22px;">
                    	<form method="POST" style="margin-top: 16px;">
                            <div class="form-group">
                                
                                <label><b style="color: #00aced;">Pin</b></label>
                                <input type="text" name="pin" value="<?php echo $pin; ?>" class="form-control" required readonly>
                            </div>
                           <!--  <div class="form-group">
                                 <label><b style="color: #00aced;">Choose Package</b></label>
                             <select name="amount" class="form-control">
                                    <option value="">Choose any Package</option>
                                    <option value="Cr">Package Credit</option>
                                    <option value="3000">Package 3000+900 GST</option>
                                    <option value="5000">Package 5000+900 GST</option>
                                    <option value="10000">Package 10000+1800 GST</option>
                                    <option value="25000">Package 25000+4500 GST</option>
                                    <option value="50000">Package 50000+9000 GST</option>
                                    <option value="100000">Package 100000+18000 GST</option>
                                     <option value="200000">Package 200000+18000 GST</option>
                                      <option value="500000">Package 500000+18000 GST</option>
                                       <option value="1000000">Package 1000000+18000 GST</option>
                                
                                </select>
                            </div> -->
                           <!--  <div class="form-group">
                                <label><b style="color: #00aced;">Sponsor id</b></label>
                                
                                <input type="text" name="sponsarid" class="form-control"value="<?php echo $sponsarid;?>" required>
                            </div> -->
                            
                            <div class="form-group">
                                <label><b style="color: #00aced;">User Id</b></label> 
                               
                                <input type="text" name="uname" class="form-control" value="" required>
                            </div>
                           <!--  <div class="form-group">
                                <label><b style="color: #00aced;">Side</b></label><br>
                                <input type="text" name="side" class="form-control" value="" required>
                            </div>
                             -->
                            <div class="form-group">
                        	<center><input type="submit" name="active" class="btn btn-primary" value="Acivate"></center>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>
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
