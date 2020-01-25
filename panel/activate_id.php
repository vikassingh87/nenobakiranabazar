<?php 
  session_start();
  $userid=$_SESSION["userid"];
  include("../connection.php");
  include('new_working_income.php');
  $date=new DateTime();
  $set_dt=$date->format('Y-m-d h:i:s');
  $sqld = mysqli_query($conn,"SELECT SUM(amount) as total FROM e_wallet WHERE user_id= '$userid'") or die(mysqli_error($conn));

  $rec1=mysqli_fetch_assoc($sqld);
  $a= $rec1['total'];
  $sqld1 = mysqli_query($conn,"SELECT SUM(balance) as bal_total FROM e_wallet WHERE user_id= '$userid'") or die(mysqli_error($conn));
  $rec2=mysqli_fetch_assoc($sqld1);
  $d=$rec2['bal_total'];
  $wallet=$a-$d;

  if (isset($_POST['submit'])) 
    {
      $package='2100';
      $uname=$_POST['user_id'];
      
      if($wallet>=$package)
      {
      $query = mysqli_query($conn,"UPDATE user SET `package`='$package',`status`='1',`active_date`='$set_dt',`diff_date`='$set_dt'  WHERE uname='$uname'");
      $insert=mysqli_query($conn,"INSERT INTO e_wallet(user_id,balance) values('$userid','$package')");
      echo '<script>alert("Activation Successfully");window.open("activate_id.php","_self");</script>';
      }
      else
      {
      echo "<script>alert('You Have Insufficient Balance');window.open('income_transfer.php','_self');</script>";
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
            background-color:#1F0105;
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
        <h3 style="color: #fbfbfb;">TopUp Id</h3>
        <hr><br>

         
         <div class="Main_name">
            <div class="Name1">
                <label>AVAILABLE BALANCE :</label>
            </div>
         <span style="color: #fbfbfb;"><?php echo New_working_income();?></span>
            </div>

       <div class="Main_name">
        <div class="Name1">
            <label>User Id</label>
        </div>
        <input type="text" class="in_box" name="user_id" value="" onchange="showCustomer(this.value)" >
       </div>
       <div class="Main_name">
            <div class="Name1">
                <label>User Name :</label>
               
            </div>
         <span style="color: #fbfbfb;"><div id="txtHint"></div></span><br>
            </div>
             <div class="Main_name">
            <div class="Name1">
                <label>Package :</label>
            </div>
         <span >
             <select name="package" class="in_box">
                                     <option value="">Choose any Package</option>
                                    <option value="Cr">Package Credit</option>
                                    <option value="3000">Package 3000+900 GST</option>
                                    <option value="5000">Package 5000+900 GST</option>
                                    <option value="10000">Package 10000+1800 GST</option>
                                    <option value="25000">Package 25000+4500 GST</option>
                                    <option value="50000">Package 50000+9000 GST</option>
                                    <option value="100000">Package 100000+18000 GST</option>
                                     <option value="200000">Package 200000+18000 GST</option>
                                      <option value="500000">Package 500000+18000 GST</option>
                                       <option value="1000000">Package 1000000+18000 GST</option>
                                
                                </select>
         </span>
            </div>
        <center>
       <input type="submit" name="submit" class="b_t" value="TopUp">
        </center>
    </div>
    </form>
</div>
<div class="col-md-2">
    </div><br>
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
