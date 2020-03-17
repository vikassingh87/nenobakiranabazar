<?php
require('connection.php');
?>
<?php
//Clicked on send buton
if(isset($_GET['approve']))
{
  $id=$_GET['approve'];
  mysqli_query($conn,"UPDATE account SET status=1 WHERE id='$id'");
  if(mysqli_affected_rows($conn))
  {
    echo '<script>alert("KYC Approved");window.location.assign("kyc_approve.php");</script>';
  }
  else
  {
    echo '<script>alert("Something wrong");window.location.assign("kyc_approve.php");</script>';
  }
      
}
if(isset($_GET['reject']))
{
  $id=$_GET['reject'];
  mysqli_query($conn,"UPDATE account SET status=2 WHERE id='$id'");
  if(mysqli_affected_rows($conn))
  {
    echo '<script>alert("KYC Rejected");window.location.assign("kyc_approve.php");</script>';
  }
  else
  {
    echo '<script>alert("Something wrong");window.location.assign("kyc_approve.php");</script>';
  }    
}

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
     
      <div class="col_1 table-responsive">
		    <center><h2>KYC Request</h2></center>
         <table class="table table-striped table-bordered">
                                <tr style="background-color: #00b6c8;border: 1px solid black; color:#fff;">
                                    <th>Sr</th>
                                    <th>Userid</th>
                                    <th>Account Holder Name</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>Branch</th>
                                    <th>IFSC</th>
                                    <th>Mobile No.</th>
                                    <th>Pan Card No.</th>
                                    <th>Aadhaar Card No.</th>
                                    <th>Nominee Name</th>
                                    <th>Nominee Relation</th>
                                    <th>Nominee Age</th>
                                    <th>Status</th>
                                    <th>Action</th>                                    
                                </tr>
                                <?php
                                    $query = mysqli_query($conn,"SELECT * FROM account WHERE status='0'");
                                    if(mysqli_num_rows($query)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_array($query)){
                                          
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['uname']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['ac_no']; ?></td>
                                                <td><?php echo $row['bank']; ?></td>
                                                <td><?php echo $row['branch']; ?></td>
                                                <td><?php echo $row['ifsc']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['pan_no']; ?></td>
                                                <td><?php echo $row['adhar_no']; ?></td>
                                                <td><?php echo $row['nominee_name']; ?></td>
                                                <td><?php echo $row['nominee_relation']; ?></td>
                                                <td><?php echo $row['nominee_age']; ?></td>
                                                <td><?php $kyc_status=$row['status']; if($kyc_status==0){ echo "Pending";}?></td>
                                                <td><a href="kyc_approve.php?approve=<?php  echo $row['id']; ?>" class='btn btn-primary btn-xs'>Approve</a><a href="kyc_approve.php?reject=<?php  echo $row['id']; ?>" class='btn btn-danger btn-xs'>Reject</a></td>
                                               
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="15" align="center">No KYC Request</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </table>
 
		 
			
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
