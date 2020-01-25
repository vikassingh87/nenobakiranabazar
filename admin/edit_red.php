<?php 
    include('connection.php');
    session_start();

   // $id=$_GET['sponsarid'];
if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $query=mysqli_query($conn,"select * from user where id='$id'");
   $rec=mysqli_fetch_array($query);
}
if (isset($_POST['update']))
 {
   $u_name=$_POST['u_name'];
   $email=$_POST['email'];
   $mob=$_POST['mob'];
  
   $pass=$_POST['pass'];
   $query=mysqli_query($conn,"update user set account='$u_name',address='$email',mobile='$mob',password='$pass' where id='$id'");
    //$query1=mysqli_query($conn,"update user set account='$u_name',mobile='$mob',password='$pass' where uname='$u_id' ");
   
   if ($query>0) {
       echo "<script>alert('Id Updated Sucessfully'),window.open('today_joining.php','_SELF');</script>";
   }
}
       
    ?><!DOCTYPE HTML>
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
        <?php include"header.php"; ?> 
      <div class="col_1">
            
         
            
            <div class="clearfix"> </div>
      </div>
      <div class="span_11">
        
        
                  <div class="col-lg-12">
                      <br><br>
                        <div class="row">
                          <div class="col-lg-4"></div>

                    <div class="col-lg-4 well">
                       <center><h2 style="color: #00b6c8;">Update Profile</h2></center>
                        <form method="POST">
                          <!--   <div class="form-group">
                                <label style="color: #ff008b;"><b>Sponsor Id</b></label>
                                <input type="text" name="s_id" class="form-control" value="<?php echo $rec['sponsar_id']; ?>" required>
                            </div>
                            <div class="form-group">
                                 <label style="color: #ff008b;"><b>User id></b></label>
                                <input type="text" name="u_id" class="form-control" value="<?php echo $rec['user_id']; ?>" required>
                            </div> -->
                            <div class="form-group">
                                 <label style="color:#0e0e0e;"><b>User name</b></label>
                                <input type="text" name="u_name" class="form-control" value="<?php echo $rec['account']; ?>" required>
                            </div>
                            <div class="form-group">
                               <label style="color: #0e0e0e;"><b>Email</b></label>
                                <input type="text" name="email" class="form-control" value="<?php echo $rec['address']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label style="color: #0e0e0e;"><b>Mobile No.</b></label>
                                <input type="text" name="mob" class="form-control" value="<?php echo $rec['mobile']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label style="color: #0e0e0e;"><b>Password</b></label>
                                <input type="text" name="pass" class="form-control" value="<?php echo $rec['password']; ?>" required>
                            </div>
                            
                            
                            <div class="form-group">
                            <center><input type="submit" name="update" class="btn btn-primary" value="Update"></center>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>
                </div><!--/.row-->
 
                    
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
