
<?php
session_start();
require('../connection.php');
 //$user_id = $_SESSION['userid'];
if(isset($_POST['submit']))
{
    if(gettype($_POST['check'])=="array")
    {
        foreach ($_POST['check'] as $transfer) {
        $pin=$_POST['check'];
          
           $trans=$_POST['transfer'];
           $sql=mysqli_query($conn,"update pin_list set uname='$trans' where id=$transfer");
            $s=mysqli_query($conn,"select * from pin_list where id=$transfer");
           while ($f=mysqli_fetch_array($s)) {
             
             $n=$f['pin'];
             $sql1=mysqli_query($conn,"insert into pin_transfer(sender,uname,pin) values('$user_id','$trans','$n')");
           }
       echo "<script> window.open ('view.php','_self');</script>";
        }
    }
}
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
    <div class="">
      <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pin Transfer</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                            <form action="" method="post">
                        	<table class="">
                            	<tr>
                                	<th>S.n.</th>
                                    <th>Pin</th>
                                    <th>Select Pin</th>
                                </tr>
                                <?php
                                 $uname = $_SESSION["userid"];
                                    //$userid="";
									$i=1;
									$query = mysqli_query($conn,"select * from pin_list where uname='$uname' and status='open' order by id desc");
									if(mysqli_affected_rows($conn)>0){
										while($row=mysqli_fetch_array($query)){
											$pin = $row['pin'];
                                            $id=$row['id'];
										?>
                                        	<tr>
                                            	<td><?php echo $i ?></td>
                                                <td><?php echo $pin ?></td>
    <td><input type="checkbox" name="check[]" value="<?php echo $row['id'] ;?>"></td>
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="2">Sorry you have no pin.</td>
                                        </tr>
                                    <?php
									}
								?>
                            </table>
                            <div class="form-group">
                                <div class="col-md-4">
                                <label style="float: right;"><b>Transfer to User_Id:</b></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="transfer" onchange="showCustomer(this.value)" required>
                                <div id="txtHint">
                               
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="submit" value="Tansfer" class="btn" style="background-color: #e74c3c;color: white;">
                            </div>

                            </div>

                        </div>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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
<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getcustomer.php?q="+str, true);
  xhttp.send();
}
</script>
</body>
</html>
