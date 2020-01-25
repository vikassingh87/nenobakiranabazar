<?php
 session_start();
 
    include('../connection.php');
    $myid=  $_SESSION["userid"];
      
  
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
     <table border="2" >
					<tr>
						<th>Sr No.</th>
						<th>User Id</th>
						<th>User Name</th>
						<th>Sponsor Id</th>
						<th>Income</th>
						<th>Date Of Joining</th>
						
						<?Php

            $query=mysqli_query($conn,"select * from user where uname='".$_SESSION['userid']."'");
            $fetch=mysqli_fetch_array($query);
             $id=$fetch['id'];
 $data="select * from user where under_userid='".$_SESSION['userid']."' and id>'$id' order by id asc";
                   $query=mysqli_query($conn,$data);
                   if([$query] > 0)
                   {
                    $i = 1;
while($rec=mysqli_fetch_array($query))
{
 // echo $rec['id'];
?>

				</tr>
				<tr>
					<td><?php echo $rec['id']; ?></td>
					<td><?php echo $rec['uname']; ?></td>
					<td><?php echo $rec['account'];?></td>
					<td><?php echo $rec['under_userid'];?></td>
					<td>25</td> 
					<td><?php echo $rec['date_joining'];?></td>
					
				    </tr>     
<?php  $i++;
// level 2
$data1="select * from user where under_userid='$rec[uname]' and id>'$rec[id]' order by id desc";
                   $query1=mysqli_query($conn,$data1);
                   if([$query1] > 0)
                   {
                   // $j = 1;
while($rec1=mysqli_fetch_array($query1))
{

//echo $rec1['id'];
      echo '  </tr>
        
          <td>'. $rec1['id'].' </td>
          <td>'. $rec1['uname'].' </td>
          <td>'. $rec1['account'].' </td>
          <td>'. $rec1['under_userid'].' </td>
          <td>3</td> 
          <td>'. $rec1['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

          // level 3
            $data2="select * from user where under_userid='$rec1[uname]' order by id desc";
                   $query2=mysqli_query($conn,$data2);
                   if([$query2] > 0)
                   {
                   // $j = 1;
while($rec2=mysqli_fetch_array($query2))
{

//echo $rec2['id'];
      echo '  </tr>
        
          <td>'. $rec2['id'].' </td>
          <td>'. $rec2['uname'].' </td>
          <td>'. $rec2['account'].' </td>
          <td>'. $rec2['under_userid'].' </td>
          <td>3</td> 
          <td>'. $rec2['date_joining'].' </td>
          
          
            </tr> ';

          //  $j++;
             // level 4
            $data3="select * from user where under_userid='$rec2[uname]' order by id desc";
                   $query3=mysqli_query($conn,$data3);
                   if([$query3] > 0)
                   {
                   // $j = 1;
while($rec3=mysqli_fetch_array($query3))
{

//echo $rec3['account'];
      echo '  </tr>
        
          <td>'. $rec3['id'].' </td>
          <td>'. $rec3['uname'].' </td>
          <td>'. $rec3['account'].' </td>
          <td>'. $rec3['under_userid'].' </td>
          <td>3</td> 
          <td>'. $rec3['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;
             // level 5
            $data4="select * from user where under_userid='$rec3[uname]' order by id desc";
                   $query4=mysqli_query($conn,$data4);
                   if([$query4] > 0)
                   {
                   // $j = 1;
while($rec4=mysqli_fetch_array($query4))
{

//echo $rec4['account'];
      echo '  </tr>
        
          <td>'. $rec4['id'].' </td>
          <td>'. $rec4['uname'].' </td>
          <td>'. $rec4['account'].' </td>
          <td>'. $rec4['under_userid'].' </td>
          <td>3</td> 
          <td>'. $rec4['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

             // level 6
            $data5="select * from user where under_userid='$rec4[uname]' order by id desc";
                   $query5=mysqli_query($conn,$data5);
                   if([$query5] > 0)
                   {
                   // $j = 1;
while($rec5=mysqli_fetch_array($query5))
{

//echo $rec5['id'];
      echo '  </tr>
        
          <td>'. $rec5['id'].' </td>
          <td>'. $rec5['uname'].' </td>
          <td>'. $rec5['account'].' </td>
          <td>'. $rec5['under_userid'].' </td>
          <td>2</td> 
          <td>'. $rec5['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

                // level 7
            $data6="select * from user where under_userid='$rec5[uname]' order by id desc";
                   $query6=mysqli_query($conn,$data6);
                   if([$query6] > 0)
                   {
                   // $j = 1;
while($rec6=mysqli_fetch_array($query6))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec6['id'].' </td>
          <td>'. $rec6['uname'].' </td>
          <td>'. $rec6['account'].' </td>
          <td>'. $rec6['under_userid'].' </td>
          <td>2</td> 
          <td>'. $rec6['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

                      // level 8
            $data7="select * from user where under_userid='$rec6[uname]' order by id desc";
                   $query7=mysqli_query($conn,$data7);
                   if([$query7] > 0)
                   {
                   // $j = 1;
while($rec7=mysqli_fetch_array($query7))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec7['id'].' </td>
          <td>'. $rec7['uname'].' </td>
          <td>'. $rec7['account'].' </td>
          <td>'. $rec7['under_userid'].' </td>
          <td>0</td> 
          <td>'. $rec7['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;
              // level 9
            $data8="select * from user where under_userid='$rec7[uname]' order by id desc";
                   $query8=mysqli_query($conn,$data8);
                   if([$query8] > 0)
                   {
                   // $j = 1;
while($rec8=mysqli_fetch_array($query8))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec8['id'].' </td>
          <td>'. $rec8['uname'].' </td>
          <td>'. $rec8['account'].' </td>
          <td>'. $rec8['under_userid'].' </td>
          <td>0</td> 
          <td>'. $rec8['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

             // level 10
            $data9="select * from user where under_userid='$rec8[uname]' order by id desc";
                   $query9=mysqli_query($conn,$data9);
                   if([$query9] > 0)
                   {
                   // $j = 1;
while($rec9=mysqli_fetch_array($query9))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec9['id'].' </td>
          <td>'. $rec9['uname'].' </td>
          <td>'. $rec9['account'].' </td>
          <td>'. $rec9['under_userid'].' </td>
          <td>0</td> 
          <td>'. $rec9['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

             // level 11
            $data10="select * from user where under_userid='$rec9[uname]' order by id desc";
                   $query10=mysqli_query($conn,$data10);
                   if([$query10] > 0)
                   {
                   // $j = 1;
while($rec10=mysqli_fetch_array($query10))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec10['id'].' </td>
          <td>'. $rec10['uname'].' </td>
          <td>'. $rec10['account'].' </td>
          <td>'. $rec10['under_userid'].' </td>
          <td>1</td> 
          <td>'. $rec10['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

             // level 12
            $data11="select * from user where under_userid='$rec10[uname]' order by id desc";
                   $query11=mysqli_query($conn,$data11);
                   if([$query11] > 0)
                   {
                   // $j = 1;
while($rec11=mysqli_fetch_array($query11))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec11['id'].' </td>
          <td>'. $rec11['uname'].' </td>
          <td>'. $rec11['account'].' </td>
          <td>'. $rec11['under_userid'].' </td>
          <td>0</td> 
          <td>'. $rec11['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;

            // level 13
            $data12="select * from user where under_userid='$rec11[uname]' order by id desc";
                   $query12=mysqli_query($conn,$data12);
                   if([$query12] > 0)
                   {
                   // $j = 1;
while($rec12=mysqli_fetch_array($query12))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec12['id'].' </td>
          <td>'. $rec12['uname'].' </td>
          <td>'. $rec12['account'].' </td>
          <td>'. $rec12['under_userid'].' </td>
          <td>0</td> 
          <td>'. $rec12['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;
              // level 14
            $data13="select * from user where under_userid='$rec12[uname]' order by id desc";
                   $query13=mysqli_query($conn,$data13);
                   if([$query13] > 0)
                   {
                   // $j = 1;
while($rec13=mysqli_fetch_array($query13))
{

//echo $rec5['account'];
      echo '  </tr>
        
          <td>'. $rec13['id'].' </td>
          <td>'. $rec13['uname'].' </td>
          <td>'. $rec13['account'].' </td>
          <td>'. $rec13['under_userid'].' </td>
          <td>0</td> 
          <td>'. $rec13['date_joining'].' </td>
          
          
            </tr> ';
          //  $j++;
} 
}
} 
}
} 
}
} 
}
} 
}
} 
}
} 
}
} 
}
} 
}

} 
}
} 
} 
} 
} 

} 
} 


}



 } ?>





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
