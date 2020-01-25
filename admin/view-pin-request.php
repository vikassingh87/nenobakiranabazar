<?php
// include('php-includes/check-login.php');
require('connection.php');
//$product_amount = 59000;
?>
<?php
//Clicked on send buton
if(isset($_POST['send'])){
    $userid = mysqli_real_escape_string($conn,$_POST['userid']);
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    if($amount=='2100')
    {
        
       $product_amount = 2100;
    }
    elseif($amount=='3000')
    {
       $product_amount = 3000;
    }
    elseif($amount=='5000')
    {
       $product_amount = 5000;
    }
    elseif($amount=='10000')
    {
         $product_amount = 10000;
    }
     elseif($amount=='25000')
    {
         $product_amount = 25000;
    }
     elseif($amount=='50000')
    {
         $product_amount =50000 ;
    }
     elseif($amount=='100000')
    {
         $product_amount = 100000;
    }
    elseif($amount=='200000')
    {
         $product_amount = 200000;
    }
     elseif($amount=='500000')
    {
         $product_amount = 500000;
    }
      elseif($amount=='1000000')
    {
         $product_amount = 1000000;
    }
     $no_of_pin = $amount/$product_amount;
    //Insert pin
    $i=1;
    while($i<=$no_of_pin){
        $new_pin = pin_generate();
        mysqli_query($conn,"insert into pin_list (`uname`,`pin`) values('$userid','$new_pin')");
        //echo "$new_pin";
        $i++;   
    }
    
    //updae pin request status
    mysqli_query($conn,"update pin_request set status='close' where id='$id' limit 1");
    
    echo '<script>alert("Pin send successfully.");window.location.assign("view-pin-request.php");</script>';    
}

//Pin generate
function pin_generate(){
    global $conn;
    $generated_pin = rand(100000,999999);
    
    $query = mysqli_query($conn,"select * from pin_list where pin = '$generated_pin'");
    if(mysqli_num_rows($query)>0){
        pin_generate();
    }
    else{
        return $generated_pin;
    }
    
}
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
     
      <div class="col_1 table-responsive">
		    <center><h2>Pin Request</h2></center>
         <table class="table table-striped table-bordered">
                                <tr style="background-color: #00b6c8;border: 1px solid black; color:#fff;">
                                    <th>S.n.</th>
                                    <th>Userid</th>
                                    <th>Amount</th>
                                    <th>Slip</th>
                                    <th>Date</th>
                                    <th>Send</th>
                                    
                                </tr>
                                <?php
                                    $query = mysqli_query($conn,"select * from pin_request where status='open' order by id DESC");
                                    if(mysqli_num_rows($query)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_array($query)){
                                            $id = $row['id'];
                                            $uname = $row['uname'];
                                            $amount = $row['amount'];
                                             $slip = $row['slip'];
                                            $date = $row['date'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $uname; ?></td>
                                                <td><?php echo $amount; ?></td>
                                               
                                               
                                                 <td><a href="../panel/doc/<?php echo $row['slip'];?>"><img src='../panel/doc/<?php echo $row['slip'];?>' hight="100" width="100"></a></td>
                                                <td><?php echo $date; ?></td>
                                                <form method="post">
                                                    <input type="hidden" name="userid" value="<?php echo $uname ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                                    <td><input type="submit" name="send" value="Send" class="btn btn-primary"></td>
                                                </form>
                                                
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="6" align="center">You have no pin request.</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </table>
 
		 
			
            <div class="clearfix"> </div>
	  </div>
	  <div class="span_11">
		
		<div class="col-md-6 col_5">
		  

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
