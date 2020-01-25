<?php
 session_start();
 
    include('connection.php');
    $myid=  $_SESSION["userid"];
      
  
    //$id=$_GET['uname'];

 //  echo  $_SESSION['uname'];

    if(isset($_SESSION['SuperId']))
    {
        $sql="select * from user where id='".$_SESSION['SuperId']."'";
        $res= mysqli_query($conn, $sql);
        $rec=mysqli_fetch_array($res);
    }
    else if(isset($_SESSION["userid"])){
       $sql="select * from user where user_id='$myid'"; 
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
		
<!-- 		<div class="col-md-6 col_5"> -->
		  <!--  -->
<div class="table-responsive">
           <!--  <h2>Basic Implementation</h2> -->
        <table class="table table-bordered table-striped" >
          <tr style="background-color: #00b6c8;  border: 1px solid black;">
            <th>Name</th>
            <th>A/C No</th>
            <th>Ifsc Code</th>
            <th>Bank</th>
            <th>Branch</th>
            <th>Pan No</th>
            <th>Mobile</th>
            <th>Action</th>
            
            <?Php
                $i=1;
               $id=$_GET['user_id'];
 $data="select * from account where uname='$id'";
                   $query=mysqli_query($conn,$data);
                   if([$query] > 0)
                   {
                    
while($rec=mysqli_fetch_array($query))
{
?>

        </tr>
        <tr>
          
          <td><?php echo $rec['name']; ?></td>
          <td><?php echo $rec['ac_no'];?></td>
          <td><?php echo $rec['ifsc'];?></td>
          <td><?php echo $rec['bank'];?>
          <td><?php echo $rec['branch'];?></td>
          <td><?php echo $rec['pan_no'];?></td>
        
          <td><?php echo $rec['mobile'];?></td>
          <td><a href="account_update.php?id=<?php echo $rec['id'];?>">Edit</a></td>
          </tr>
          
            </tr>     
<?php  } } ?>





        </table>
          </div>
      <!--  -->

<!-- </div>
 -->	    
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
