
<?php
session_start();
require('../connection.php');
//include('php-includes/check-login.php');
//$userid = $_SESSION['userid'];
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
<!-- <link rel="stylesheet" type="text/css" href="css/table-style.css" /> -->
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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
    <div class="">
      <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">My Direct Team</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered" id="example2">
                        	    <thead style="background-image: linear-gradient(#8effb3c2,#f7d115);">
                            	<tr style="background-color: #08f1e9;color: #000000;">
                            	    
                                	<th>Sr.No</th>
                                    <th>User_Id</th>
                                     <th>User_Name</th>
                                     <th>Sponsor_Id</th>
                                      <th>Sponsor_Name</th>
                                      <th>Package</th>
                                      <th>Mobile No</th>
                                      <th>Activation_Date</th>
                                      

                                </tr>
                                </thead>
                                 <tbody>
                                <?php
                                 $uname = $_SESSION["userid"];
                                    //$userid="";
									$i=1;
									$query = mysqli_query($conn,"SELECT * FROM user where sponsor_id='$uname'")or die(mysqli_error($conn));
									if(mysqli_affected_rows($conn)>0){
										while($row=mysqli_fetch_array($query)){
											 $user_id = $row['user_id'];
                       $status=$row['status'];
                       if ($status==1) 
                       {
                        $color="green";
                        $txt="white";
                       }
                       else
                       {
                        $color="red";
                        $txt="white";
                       }
										?>
                                        	<tr style="background-color: <?php echo $color; ?>;color: <?php echo $txt; ?>">
                                            	<td><?php echo $i ?></td>
                                                <td><?php echo $user_id = $row['user_id'];?></td>
                                                <td><?php  echo $user_name=$row['user_name'];?></td>
                                                <td><?php  echo $sponsor_id=$row['sponsor_id'];?></td>
                                                <td><?php  echo $sponsor_name=$row['sponsor_name'];?></td>
                                                <td><?php  echo $package=$row['package'];?></td>
                                                <td><?php  echo $mobile=$row['mobile'];?></td>
                                                <td><?php  echo $date=$row['active_date'];?></td>

                                            </tr>
                                        <?php
											$i++;
										}
									}
									
									?>
                                    </tbody>	
                                   
                            </table>
                        </div>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

		<div class="clearfix"> </div>
	    </div><br>
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
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      
    })
  })
</script>
</body>
</html>
