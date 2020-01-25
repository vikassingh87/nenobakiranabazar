
<?php
session_start();
require('../connection.php');

$userid = $_SESSION['userid'];
$sql=mysqli_query($conn,"SELECT * FROM user where user_id='$userid'");
$row=mysqli_fetch_assoc($sql);
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
<!-- <link rel="stylesheet" type="text/css" href="css/table-style.css" /> -->
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<style>
 
    .id-card-holder {
      width: 283px;
        padding: 4px;
        margin: 0 auto;
        background-color: #1f1f1f;
        border-radius: 5px;
        position: relative;
    }
    .id-card-holder:after {
        content: '';
        width: 7px;
        display: block;
        background-color: #0a0a0a;
        height: 100px;
        position: absolute;
        top: 105px;
        border-radius: 0 5px 5px 0;
    }
    .id-card-holder:before {
        content: '';
        width: 7px;
        display: block;
        background-color: #0a0a0a;
        height: 100px;
        position: absolute;
        top: 105px;
        left: 272px;
        border-radius: 5px 0 0 5px;
    }
    .id-card {
      
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 0 1.5px 0px #b9b9b9;
    }
    .id-card img {
      margin: 0 auto;
    }
    .header img {
      width: 100px;
        margin-top: 15px;
    }
    .photo img {
      width: 80px;
        margin-top: 15px;
    }
    h2 {
      font-size: 15px;
      margin: 5px 0;
    }
    h3 {
      font-size: 12px;
      margin: 2.5px 0;
      font-weight: 300;
    }
    .qr-code img {
      width: 50px;
    }
    p {
      font-size: 10px;
      margin: 2px;
    }
    .id-card-hook {
      background-color: #000;
        width: 70px;
        margin: 0 auto;
        height: 15px;
        border-radius: 5px 5px 0 0;
    }
    .id-card-hook:after {
      content: '';
        background-color: #d7d6d3;
        width: 47px;
        height: 6px;
        display: block;
        margin: 0px auto;
        position: relative;
        top: 6px;
        border-radius: 4px;
    }
    .id-card-tag-strip {
      width: 45px;
        height: 40px;
        background-color: #0950ef;
        margin: 0 auto;
        border-radius: 5px;
        position: relative;
        top: 9px;
        z-index: 1;
        border: 1px solid #0041ad;
    }
    .id-card-tag-strip:after {
      content: '';
        display: block;
        width: 100%;
        height: 1px;
        background-color: #c1c1c1;
        position: relative;
        top: 10px;
    }
   th,td { text-align: left }


#borders{position:relative; z-index:10; background:#fff; border:2px solid #000000; }
#borders:before{content:""; display:block; position:absolute; z-index:-1; top:2px; left:2px; right:2px; 
bottom:2px; border:2px solid #36F}

.cardfooter{
  margin-top: 39px;
    font-size: 9px;
    padding: 3px;
    background-color: blue;
    color: white;
    margin-left: -10px;
    margin-right: -10px;
    margin-bottom: -10px;
}
</style>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper" style="background-color: #ecf0f5;">
        <div class="graphs">
     	<?php //include"header.php"; ?> 
      
	  
       <div class="clearfix"> </div>
    </div>
    <div class="">
      <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">ID Card</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    <div class="id-card-tag-strip"></div>
  <div class="id-card-hook"></div>
  <div class="id-card-holder">
    <div class="id-card">
      <div class="header">
        <img src="../images/logo/logo1.png" style="max-width: 77px;" >
      </div>
      <div class="photo" >
        <?php 
        if ($profile_photo=='') 
        { ?>
        <img src="images/user.png" id="borders">
      <?php } else{ ?>
        <img src="images/<?php echo $profile_photo; ?>" id="borders">
      <?php } ?>
      </div>
     <div class="" style="margin-left: 35px; margin-top: 10px;">
       
         <table >
        <tr >
          <th>Name</th>
          <td>: <?php echo $row['user_name']; ?></td>
        </tr>
         <tr>
          <th>User ID</th>
          <td>: <?php echo $userid; ?></td>
        </tr>
         <tr>
          <th>Designation</th>
          <td>: Member</td>
        </tr>
         <tr>
          <th>Joining Date</th>
          <td>: <?php echo date('d-m-Y',strtotime($row['date_joining'])); ?></td>
        </tr>
      </table>
      <br>
       
     </div>
     <div class="row">
      <div class="col-md-6">
        <h3><b>Address:</b></h3>
        <p><?php echo $address; ?></p>
      </div>
      <div class="col-md-6">
        <img src="images/sign.png" style="max-width: 80px;">
        <h3><b>Authroized Signature</b></h3>
      </div>
       
     </div>
    <p class="cardfooter">Website : www.nenobakiranabazar.com<br> Email : support@nenobakiranabazar.com</p>
      

      
      

    </div>
  </div>
                    
                    </div>
                </div><!--/.row-->
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
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      
    })
  })
</script>
</body>
</html>
