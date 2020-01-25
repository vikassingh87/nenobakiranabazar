<?php
session_start();
require('../connection.php');
//include('php-includes/check-login.php');
//$email = $_SESSION['userid'];
?>
<?php
//pin request 
if(isset($_POST['pin_request'])){
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
      $img=$_FILES["img"]["name"];
    $tmpname=$_FILES["img"]["tmp_name"];
    move_uploaded_file($tmpname,'doc/'.$img);
    $date = date("y-m-d");
    $uname= $_SESSION["userid"];
    
    if($amount>='2100' || $amount=='Cr' ){
        //Inset the value to pin request
        $query = mysqli_query($conn,"insert into pin_request(`uname`,`amount`,`slip`,`date`) values('$uname','$amount','$img','$date')") or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)){
            echo '<script>alert("Pin request sent successfully");window.location.assign("getpin.php");</script>';
        }
        else{
            
            echo '<script>alert("Unknown error occure.");window.location.assign("getpin.php");</script>';
        }
    }
    else{
        echo '<script>alert("Your Amount Is Less than 2100");</script>';
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
     <!-- Page Content -->
        <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Choose Package</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-4">
                        <form method="POST" enctype="multipart/form-data">  
                            <div class="form-group">
                                <label><b style="color: #06d995;">Amount</b></label>
                                <!--<input type="text" name="amount" class="form-control" required>-->
                                <select name="amount" class="form-control">
                                    <option value="">Choose any Package</option>
                                    <!-- <option value="Cr">Package Credit</option> -->
                                    <option value="2100">2100</option><!-- 
                                    <option value="5000">Package 5000+900 GST</option>
                                    <option value="10000">Package 10000+1800 GST</option>
                                    <option value="25000">Package 25000+4500 GST</option>
                                    <option value="50000">Package 50000+9000 GST</option>
                                    <option value="100000">Package 100000+18000 GST</option>
                                     <option value="200000">Package 200000+18000 GST</option>
                                      <option value="500000">Package 500000+18000 GST</option>
                                       <option value="1000000">Package 1000000+18000 GST</option> -->
                                </select>
                                 <label><b style="color: #06d995;">Upload Payment receipt</b></label>
                                <input type="file" name="img" class="form-control" required>
                               
                            </div>
                            <div class="form-group">
                                <input type="submit" name="pin_request" class="btn btn-primary" value="Pin Request">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <br><br>
                        <table >
                            <tr>
                                <th>S.n.</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            <?php 
                           // $email="";
                            $uname = $_SESSION["userid"];
                            $i=1;
                            $query = mysqli_query($conn,"select * from pin_request where uname='$uname' order by id desc");
                            if(mysqli_affected_rows($conn)>0){
                                while($row=mysqli_fetch_array($query)){
                                    $amount = $row['amount'];
                                    $date = $row['date'];
                                    $status = $row['status'];
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $status; ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                            }
                            else{
                            ?>
                                <tr>
                                    <td colspan="4">You have no pin request yet.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
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
</body>
</html>
