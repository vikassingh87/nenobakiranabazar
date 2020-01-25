<?php
session_start();
$userid = $_SESSION["userid"];

include("../connection.php");
include("count_function.php");
include('wallet_amount.php');

$check = mysqli_query($conn, "SELECT * FROM income where user_id='$userid'");
if (mysqli_affected_rows($conn)) {
    $wallet_income;
    $query = mysqli_query($conn, "SELECT * FROM withdrawal_list where uname='$userid'");
    $mt    = '0';
    while ($f = mysqli_fetch_assoc($query)) {
        $mt += $f['amount'];
    }
    
} else {
    $sql    = "INSERT INTO income (`user_id`,`total_income`,`balance`,`status`)VALUES('$userid','$wallet_income','$wallet_income','1')"or die(mysqli_error($conn));
    $result = mysqli_query($conn, $sql);
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

    <?php 
    $ac=mysqli_query($conn,"SELECT * FROM account WHERE uname='".$_SESSION['userid']."' ");
    $fetch=mysqli_fetch_array($ac);

     ?>
    <div class="content_bottom">
        <div id="">
          
				<center><h2>Payment Report</h2></center>
                    </div>
                </div><!--/.row-->
                <div class="container-fluid">
                 <div class="table-responsive">
					 <!--  <h2>Basic Implementation</h2> -->
				<table border="2"  class="table">
					<tr>
						  <th>Sr no.</th>
						<th>Requested Amount</th>
						<th>Paid Amount</th>
						<th>Admin Charge 10%</th>
						<th>TDS Charge 5%</th>
						<th>Requested Date</th>
						<th>Bank</th>
						<th>Ifsc Code</th>
						<th>Branch</th>
						<th>Account No.</th>
						<th>Status</th>
						<?Php
						   $i=1;
 $data="SELECT * FROM withdrawal_request WHERE uname='".$_SESSION['userid']."' and bank_name!=''";
                   $query=mysqli_query($conn,$data);
                   if([$query] > 0)
                   {
                    
while($rec=mysqli_fetch_array($query))
{
?>

				</tr>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $rec['amount']; ?></td>
				    <td><?php echo $rec['paid']; ?></td>
				    <td><?php echo $rec['admin']; ?></td>
					<td><?php echo $rec['tds']; ?></td>
					<td><?php echo $rec['request_date'];?></td>
					
                    <td><?php echo $rec['bank_name'];?>
                    <td><?php echo $rec['ifsc'];?></td>
                    <td><?php echo $rec['branch_name'];?></td>
                    <td><?php echo $rec['acc_no'];?></td>
                    
                    <td><?php echo $rec['status'];?></td>
					
					
				    </tr>     
<?php  $i++;} } ?>





				</table>
					</div>
				</div>

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
<!--    <script type="text/javascript">-->
<!--	$(function() {-->
<!--  var now = new Date(),-->
<!--      days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],-->
<!--      day = days[now.getDay()],-->
<!--      $button = $('#myButton');-->
  
<!--  if (day === days[0] || day === days[6]) {-->
      
<!--      document.getElementById("myButton").disabled = true;-->
<!--  }-->
  
  
<!--})-->
<!--</script>-->
</body>
</html>
