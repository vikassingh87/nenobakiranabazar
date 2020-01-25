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


if (isset($_POST['send'])) {
    $post_array = $_POST;
    $uname      = $_POST['uid'];
    $name       = $_POST['name'];
    $account    = $_POST['account'];
    $ifsc       = $_POST['ifsc'];
    $branch     = $_POST['branch'];
    $panno      = $_POST['panno'];
    $mobile     = $_POST['mobile'];
    $wallet     = $_POST['balance'];
    $amount     = $_POST['amount'];
    $status     = "Pending";
    if ($amount >= '100') {
        if ($amount > $wallet) {
            //echo "<script>alert('You have not sufficient balance');</script>";
        } else {
            
            
            
            
            // else {
            //     $as = mysqli_query($conn, "select * from income where user_id='$userid'");
            //     $gh = mysqli_fetch_assoc($as);
            //     $a  = $gh['balance'];
            //     $to = $a - $amount;
            
            //     $sqljk = mysqli_query($conn, "update income set balance='$to' where user_id='$userid' ");
            $sql    = "INSERT INTO withdrawal_request (`uname`,`name`,`acc_no`,`ifsc`,`branch_name`,`pan`,`mobile`,`bank_name`,`wallet`,`amount`,`status`)VALUES('$userid','$name','$account','$ifsc','$branch','$panno','$mobile','$uname','$wallet','$amount','$status')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($result > 0) {
                
                echo "<script>alert('Your request has been submitted successfully');window.open('withdral.php','_self');</script>";
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                
            }
        }
    } else {
        echo "<script>alert('Minumum withdrwal 500');window.open('withdral.php','_self');</script>";
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

    <?php 
    $ac=mysqli_query($conn,"SELECT * FROM account WHERE uname='".$_SESSION['userid']."' ");
    $fetch=mysqli_fetch_array($ac);

     ?>
    <div class="content_bottom">
        <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">Withdrawal Request</h1>
                      <form action="#" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
						 
						<div class="col-sm-12">
					<input type="hidden" name="sponsarid" value="<?php echo $_SESSION['userid']; ?>"  class="form-control" placeholder="Account Holder Name" required >
				</div>
			</div>
			</div>
				<div class="form-group">
				<div class="row">
			
<div class="col-sm-6">
	            <label>Bank Name</label>
					<input type="text" name="uid" value="<?php echo $fetch['bank'] ?>"  class="form-control"  placeholder="userid" required readonly>
				</div>
				<?php
				$dt=new DateTime();
                $ct= $dt->format('Y-m-d');
				// $as=mysqli_query($conn,"select * from working_income where user_id='$userid'");
				// $gh=mysqli_fetch_assoc($as);
				
				//   $d=$gh['income'];

				$income=mysqli_query($conn,"select * from withdrawal_list where uname='$userid' ORDER by id desc");
				$inc_f=mysqli_fetch_assoc($income);
				  $c=$inc_f['amount'];

				
				?>
			
		<div class="col-sm-6">
			<label>Wallet Amount</label>
		<input type="text" name="balance"  class="form-control"  placeholder="Wallet Balance" required value="<?php echo Wallet_amount();?>" readonly>
				</div>
			</div>
		</div>
		
		<hr>
						 
						<div class="form-group">
					<div class="row">	
				<div class="col-sm-6">
				<label>Account Holder Name</label>
					<input type="text" name="name" value="<?php echo $fetch['name'] ?>"  class="form-control" placeholder="Account Holder Name" required readonly>
				</div>
				<div class="col-sm-6">
					<label>Account No</label>
					<input type="text" name="account" value="<?php echo $fetch['ac_no'] ?>" class="form-control"  placeholder="A/C No" required readonly >
				</div>
				</div>
			</div>
			
			<hr>
			<div class="form-group">
				<div class="row">
			
<div class="col-sm-6">
	<label>Account Holder Name</label>
					<input type="text" name="ifsc"  class="form-control" value="<?php echo $fetch['ifsc'] ?>" placeholder="IFSC Code" required readonly>
				</div>
			
		<div class="col-sm-6">
			<label>Branch Name</label>
		<input type="text" name="branch"  class="form-control" value="<?php echo $fetch['branch'] ?>"  placeholder="Branch Name" required readonly>
				</div>
			</div>
		</div>
		
		<hr>
		<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<label>Pan No</label>
					<input type="text" name="panno"  class="form-control" value="<?php echo $fetch['pan_no'] ?>" placeholder="PAN Card No " required readonly >
				</div>
							 <div class="col-sm-6">
							 	<label>Mobile No</label>
					<input type="text" name="mobile"  class="form-control" value="<?php echo $fetch['mobile'] ?>" placeholder="Mobile No" required readonly>
				</div>
			</div>
			</div>
			<hr>

				
				
		
			<div class="form-group">
				<div class="row">
					

				</div>
				<div class="col-sm-6">
					<label>Enter the Withdrawal Amount</label>
				<input type="text" name="amount"  class="form-control" value="" placeholder="Enter the Amount" required="">

				</div>
			</div>
		</div>
			<hr>

			<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<input type="submit" name="send" id="myButton" class="btn-primary" value="Submit" style="margin-left: 105px;
    margin-top: 10px;border-radius: 10px;">
</div>
<div class="col-md-4"></div>
</div>
</div>
				</form>
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
