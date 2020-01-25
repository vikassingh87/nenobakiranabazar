<?php 
session_start();
//error_reporting(null);
$userid=$_SESSION["userid"];
include("../connection.php");
if(isset($_POST['submit'])) 
{
    $old=$_POST['old_pass'];
    $new=$_POST['new_pass'];
    $confirm=$_POST['conf_pass'];

    if($new==$confirm) 
    {
       $check=mysqli_query($conn,"SELECT * FROM user where password='$old'and uname='$userid'");
       if(mysqli_affected_rows($conn)) 
       {
           $update=mysqli_query($conn,"UPDATE user SET password='$new' where uname='$userid'");
           if(mysqli_affected_rows($conn)) 
           {
             echo "<script>alert('Password Change Successfully.');window.open('index.php','_self');</script>";
           }
           else
           {
             echo "<script>alert('Something Wrong.Please try again later.');window.open('change_password.php','_self');</script>";
           }
       }
       else
       {
//echo "Error: " . $check . "<br>" . mysqli_error($conn);
         echo "<script>alert('Old password wrong.');window.open('change_password.php','_self');</script>";
       }
    }
    else
    {
        echo "<script>alert('Old and New Password doesn`t match.');window.open('change_password.php','_self');</script>";
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
<style type="text/css">
   .Main_box
        {
            width: 100%;
            height:auto;
            overflow: hidden;
            margin-left: auto;
            padding:20px;
            margin-right: auto;
            background-color: #1bb6b1;
            margin-top: 40px;
            
        }
        .Name1
        {
            float: left;
            width: 200px;
            overflow: hidden;
            color: #fbfbfb;
        }
        .Main_name
        {
            margin-top: 20px;
            margin-left:50px;
        }
        .in_box
        {
            width: 240px;
            height: 30px;
            margin-left: 10px;
            border-radius: 5px;
            border: none;
            color: black;
            
        }
        .b_t
        {
            margin-top: 20px;
            width: 100px;
            height: 35px;
            background-color:#0000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
        }
</style>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">

            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
        <form action="" method="POST">
        <div class="Main_box">
        <h3 style="color: #fbfbfb;">Change Password</h3>
        <hr><br>
            
         
         <div class="Main_name"><div class="Name1"><label><b>Old Password :</b></label>
         </div><input type="password" class="in_box" name="old_pass" value="" required></div>

       
       <div class="Main_name"><div class="Name1"><label><b>New Password :</b></label>
        </div><input type="password" class="in_box" name="new_pass" value="" required></div>

        <div class="Main_name"><div class="Name1"><label><b>Confirm Password :</b></label>
        </div><input type="password" class="in_box" name="conf_pass" value="" required></div>
        <br>
        <center>
       <input type="submit" name="submit" class="btn btn-success" value="Change Password">
        </center>
    </div>
    </form>
</div>
<div class="col-md-2">
    </div>
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
