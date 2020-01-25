<?php
   session_start();

   include("../connection.php");
   if(isset($_POST['submit']))
{
	$post_array = $_POST;
	$sponsarid=$_POST['sponsarid'];
	$name=$_POST['name'];
	$account=$_POST['account'];
	$ifsc=$_POST['ifsc'];
	$branch=$_POST['branch'];
	$panno=$_POST['panno'];
     $mobile=$_POST['mobile'];
     
     $bank=$_POST['bank'];
    
    
     
     $check=mysqli_query($conn,"select * from account where uname='$sponsarid'");
     $fetch=mysqli_fetch_array($check);
	if($fetch>0)
	{
	    echo "<script>alert('Your Account is already added!!!');</script>";
	}
	else{
	   $sql="INSERT INTO account (`uname`,`name`,`ac_no`,`ifsc`,`branch`,`pan_no`,`mobile`,`bank`)VALUES('$sponsarid','$name','$account','$ifsc','$branch','$panno','$mobile','$bank')";
			$result=mysqli_query($conn,$sql);
			if($result>0)
			{   
			 echo "<script>alert('Your Account added Successfully!!!');</script>";

			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);

			}
	}
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
                       <center><h1 class="page-header" >Fill Acoount Details</h1></center>
                      <form action="#" method="post"enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
						 
						<div class="col-sm-12">
					<input type="hidden" name="sponsarid" value="<?php echo $_SESSION['userid']; ?>"  class="form-control" placeholder="Account Holder Name" required=" " >
				</div>
						
						<div class="col-sm-6">
							<label>Bank Name</label>
					<input type="text" name="bank"  class="form-control" placeholder="Bank Name" required="Please Enter Bank Name" >

				</div>
						
					<div class="col-sm-6">
						<label>Account Holder Name</label>
					<input type="text" name="name"  class="form-control" placeholder="Account Holder Name" required=" " >
				</div>
				
				</div>
			</div>
			<hr>
			<div class="form-group">
				<div class="row">
			<div class="col-sm-6">
				<label>Account No</label>
					<input type="text" name="account" class="form-control"  placeholder="A/C No" required=" Please Enter Account Holder Name " >
				</div>
					<div class="col-sm-6">
						<label>IFSC  Code</label>
					<input type="text" name="ifsc"  class="form-control"  placeholder="IFSC Code" required=" Please Enter IFSC Code" >
				</div>
			
		
			</div>
		</div>
		
		<hr>
		<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<label>Branch Name</label>
		<input type="text" name="branch"  class="form-control"  placeholder="Branch Name" required=" Please Enter Branch Name " >
				</div>
				 <div class="col-sm-6">
				 	<label>Mobile No</label>
					<input type="text" name="mobile"  class="form-control" placeholder="Mobile No" required=" Please Enter Mobile No" >
				</div>
					
			</div>
			</div>
			

				
			<hr>
				<div class="form-group">
				<div class="row">
					
					<div class="col-sm-6">
						<label>Pancard No</label>
					<input type="text" name="panno"  class="form-control" placeholder="PAN Card No " required=" Please Enter PAN Card No" >
				</div>
						
			</div>
			</div>
			<hr>
			<div class="form-group">
				<div class="row">
					
			</div>

			<!--<hr>-->
				
					<center><input type="submit" name="submit" class="btn-primary" value="Add Details"></center> 
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
