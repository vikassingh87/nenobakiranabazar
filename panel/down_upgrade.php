<?php
 session_start();
 
    include('../connection.php');
    $myid=  $_SESSION["userid"];
     if (isset($_GET['id'])) {
  $id=$_GET["id"];
  
    $query=mysqli_query($conn,"select * from user_reg where id=$id ") or die("error"); 
    $rec=mysqli_fetch_array($query);

 
  } 
  
    //$id=$_GET['uname'];

 //  echo  $_SESSION['uname'];

    if(isset($_SESSION['SuperId']))
    {
        $sql="select * from user_reg where id='".$_SESSION['SuperId']."'";
        $res= mysqli_query($conn, $sql);
        $rec=mysqli_fetch_array($res);
    }
    else if(isset($_SESSION["userid"])){
        $sql="select * from user_reg where user_id='$myid'"; 
         $res1= mysqli_query($conn, $sql);
    $rec1=mysqli_fetch_array($res1);
    }
    else{
        //echo '<script>window.location.href="index.php";</script>';
    }
    
                // echo" hi,".$rec['uname']." ";
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
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
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
		
		<div class="col-md-6 col_5">
		  

</div>
	    
       </div>
       <div class="clearfix"> </div>
    </div>
    <div class="content_bottom table-responsive">
     	 <!--  <h2>Basic Implementation</h2> -->
				<table border="2" >
					<tr>
						<th>Sr No.</th>
						<th>User Id</th>
						<th>User Name</th>
						<th>Sponsor Id</th>
						<th>Mobile No.</th>
						<th>Date Of Joining</th>
						<th>ID Upgrade</th>
						<?Php
  	$data="select * from user_reg where sponsar_id='".$_SESSION['userid']."' and status='0' order by id desc";
                   $query=mysqli_query($conn,$data);
                   if([$query] > 0)
                   {
                    $i = 1;
while($rec1=mysqli_fetch_array($query))
{
?>

				</tr>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $rec1['user_id']; ?></td>
					<td><?php echo $rec1['name'];?></td>
					<td><?php echo $rec1['sponsar_id'];?></td>
					<td><?php echo $rec1['mobile'];?></td>
					<td><?php echo $rec1['date'];?></td>
 
					 <td><a href="upgrade.php?id=<?php echo $rec1['id'];?>">Upgrade Id</a></td>
				    </tr>     
<?php  $i++;} } ?>





				</table>
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
