
<?php 
session_start();
error_reporting(null);
include_once("../connection.php");
$userid=$_SESSION['userid'];
$query=mysqli_query($conn,"SELECT * FROM account WHERE uname='$userid'");
if(mysqli_affected_rows($conn))
{
    $row=mysqli_fetch_assoc($query);
    $acount_holder_name=$row['name'];
    $acount_no=$row['ac_no'];
    $ifsc=$row['ifsc'];
    $branch=$row['branch'];
    $pan_no=$row['pan_no'];
    $kyc_mobile=$row['mobile'];
    $bank=$row['bank'];
    $adhar_no=$row['adhar_no'];
    $nominee_name=$row['nominee_name'];
    $nominee_relation=$row['nominee_relation'];
    $nominee_age=$row['nominee_age'];
    $kyc_status=$row['status'];
}
else
{
    $acount_holder_name='None';
    $acount_no='None';
    $ifsc='None';
    $branch='None';
    $pan_no='None';
    $kyc_mobile='None';
    $bank='None';
    $adhar_no='None';
    $nominee_name='None';
    $nominee_relation='None';
    $nominee_age='None';
    $kyc_status='None';
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
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">
        <div class="graphs">
     	<?php include"header.php";
     
     	 ?>

     
       <div class="clearfix"> </div>
    </div>
    
    <div class="content_bottom">
      <div class="row">
     <div class="col-md-6 ">
      
      <div class="bs-example1" data-example-id="contextual-table">
        
        <table class="table" border="1">
          <tr>
            <td colspan="2" style="background-color: #00aced;color:white;font-size: 25px;"> Bank Details</td>
          </tr>
            <tr class="">

              <th style="color:#00aced;">Account Holder Name</th>
              <td><?php echo $acount_holder_name;?></td>
            </tr>
             <tr class="">
             <th style="color:#00aced;">Account Number</th>
              <td><?php echo $acount_no;?></td>
              
            </tr>
             <tr class="">
             <th style="color:#00aced;">Bank Name</th>
              <td><?php echo $bank;?></td>
              
            </tr>
          
         
            <tr class="">
                <th style="color:#00aced;">Branch Name</th>
              <td><?php echo $branch;?></td>
              
            </tr>
            <tr class="">
              <th style="color:#00aced;">IFSC Code</th>
              <td><?php echo $ifsc;?></td>
              
            </tr>
             <tr class="">

              <th style="color:#00aced;">Mobile Number</th>
              <td><?php echo $kyc_mobile;?></td>
            </tr>
          
        </table>
       </div>
    </div>

     <div class="col-md-6 ">
      
      <div class="bs-example1" data-example-id="contextual-table">
        
        <table class="table" border="1">
          <tr>
            <td colspan="2" style="background-color: #00aced;color:white;font-size: 25px;"> KYC Details</td>
          </tr>
           
             <tr class="">
             <th style="color:#00aced;">Pancard Number</th>
              <td><?php echo $pan_no;?></td>
              
            </tr>
             <tr class="">
             <th style="color:#00aced;">Aadhaar Card Number</th>
              <td><?php echo $adhar_no;?></td>
              
            </tr>
          
            <tr class="">
                <th style="color:#00aced;">Nominee Name</th>
              <td><?php echo $nominee_name;?></td>
              
            </tr>
            <tr class="">
              <th style="color:#00aced;">Nominee Relation</th>
              <td><?php echo $nominee_relation;?></td>
              
            </tr>
            <tr class="">
              <th style="color:#00aced;">Nominee Age</th>
              <td><?php echo $nominee_age;?></td>
              
            </tr>
             <tr class="">
              <th style="color:#00aced;">Status</th>
              <td><?php  if($kyc_status==0){echo "<span class='badge badge-warning'>Pending</span>";}elseif($kyc_status==1){echo "<span class='badge badge-success'>Approved</span>";}elseif($kyc_status==2){echo "<span class='badge badge-danger'>Rejected</span>";};?></td>
              
            </tr>
          
        </table>
       </div>
    </div>
     </div>

    
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
