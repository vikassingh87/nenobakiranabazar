<?php
   session_start();

   include("../connection.php");
  
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
	.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(9, 9, 9);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>
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
    <div class="content_bottom">
        <div id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       <center><h1 class="page-header" style="color:#06d995">My Profile Details</h1></center>
                    
  <div class="panel panel-info" style="border-color: #e89a0b;">
            <div class="panel-heading" style="background-color: #e89a0b;">
              <h3 class="panel-title" style="color: black;font-size: 19px;"><?php echo $name;?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
               
               <div class=" col-lg-1"></div>
                <div class=" col-md-12 col-lg-10 "> 
                <div class="table-responsive">
                 <center><table class="table table-user-information" style="border: 1px solid black;">
                    <tbody>
                      <tr>
                        <td style="color:#0d996c; font-size: 14px;">Name:</td>
                        <td><?php echo $name;?></td>
                      </tr>
                      <tr>
                        <td style="color:#0d996c; font-size: 14px;">User id:</td>
                        <td><?php echo $userid;?></td>
                      </tr>
                      <tr>
                        <td style="color:#0d996c; font-size: 14px;">Password:</td>
                        <td>06/23/2013</td>
                      </tr>
                      <tr>
                        <td style="color:#0d996c; font-size: 14px;">Registration Date:</td>
                        <td><?php echo $date;?></td>
                      </tr>
                       <tr>
                        <td style="color:#0d996c; font-size: 14px;">Activation Date:</td>
                        <td><?php echo $date1;?></td>
                      </tr>
                   <tr>
                        <td style="color:#0d996c; font-size: 14px;">Package:</td>
                        <td><?php echo $package;?></td>
                      </tr>
                      <tr>
                        <td style="color:#0d996c; font-size: 14px;">Email id:</td>
                        <td><?php echo $email;?></td>
                      </tr>
                        <tr>
                        <td style="color:#0d996c; font-size: 14px;">Mobile No.:</td>
                        <td><?php echo $mobile;?></td>
                      </tr>
                      
                    
                     
                    </tbody>
                  </table>
                  </center> 

                  </div>
                </div>
                 <div class=" col-lg-1"></div>
              </div>
            </div>
                
            
          </div>
                    
<div class="table-responsive">
          
        <table class="table table-bordered table-striped" >
          <tr>
            <th>Name</th>
            <th>A/C No</th>
            <th>Ifsc Code</th>
            <th>Bank</th>
            <th>Branch</th>
            <th>Pan No</th>
           
            <th>Mobile</th>
            
            <?Php
                $i=1;
               //$id=$_GET['user_id'];
 $data="select * from account where uname='$myid'";
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
          <!--<td><a href="#?id=<?php echo $rec['id'];?>">Edit</a></td>-->
          </tr>
          
            </tr>     
<?php  } } ?>





        </table>
          </div>

                    </div>
                </div><!--/.row-->
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
</body>
</html>
