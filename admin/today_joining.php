
<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nenoba Kirana Bazar | Admin</title>
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
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">
        <div class="graphs">
     
      <div class="col_1">
        <center><h2>Today's Joining</h2></center>
		    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr style="background-color:#00b6c8; border: 1px solid black; color:#fff;">
                                <th>S.n.</th>
                                <th>Sponsar Id</th>
                                <th>Sponsar Name</th>
                                <th>User Id</th>
                                 <th>Mobile No</th>
                                 
                                   <th>Date of Joining</th>
                            </tr>
                            <?php 
                           // $email="";
                            $dt=new DateTime();
                             $ct= $dt->format('Y-m-d');
                            $i=1;
                            $query = mysqli_query($conn,"select * from user WHERE DATE(`date_joining`) = '$ct' order by id desc");
                              //$qu=mysqli_num_rows($query);
                            if([$query]>0)
                            {
                                while($row= mysqli_fetch_assoc($query)){
                                /*  $amount = $row['amount'];
                                    $date = $row['date'];
                                    $status = $row['status'];*/
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?> </td>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo $row['sponsor_id']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                       
                                        <td><?php echo $row['date_joining']; ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                            }
                            else{
                            ?>
                               <!--  <tr>
                                    <td colspan="4">You have no pin request yet.</td>
                                </tr -->
                            <?php
                            }
                            ?>
                        </table>
                    </div>
		 
			
            <div class="clearfix"> </div>
	  </div>
	  <div class="span_11">
		
		<div class="col-md-6 col_5">
		  

</div>
	    
       </div>
       <div class="clearfix"> </div>
    </div>
    <div class="content_bottom">
    
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
</body>
</html>
