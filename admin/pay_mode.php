<?php 
   include('connection.php');
   session_start();
   
   // $id=$_GET['sponsarid'];
   if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $we=mysqli_query($conn,"SELECT * FROM withdrawal_request WHERE id=$id");
   $fv=mysqli_fetch_assoc($we);
   $wall=$fv['uname'];
   $requesed_amount=$fv['amount'];
   $req_amt_dedcut= $requesed_amount*15/100;
   $req_amt=$requesed_amount-$req_amt_dedcut;
   $dt=new DateTime();
               $ct= $dt->format('Y-m-d');
              $sql_sum=mysqli_query($conn,"SELECT SUM(income) as total1 FROM working_new_income WHERE sponsor_id='$wall'"); 
               $sql_fetch=mysqli_fetch_assoc($sql_sum);
                $fetch_total_working_income=$sql_fetch['total1'];
   
   
                $sql_withdrawal_list = mysqli_query($conn,"SELECT SUM(amount) as total FROM withdrawal_list WHERE uname= '$wall'") or die(mysqli_error($conn));
                  $rec1=mysqli_fetch_assoc($sql_withdrawal_list);
                  $withdrawal_amount= $rec1['total'];
                   $wallet=$fetch_total_working_income-$withdrawal_amount;
   }
    
   if(isset($_POST['send'])){
   $userid = mysqli_real_escape_string($conn,$_POST['userid']);
   $amount = mysqli_real_escape_string($conn,$_POST['amount']);
   $id = mysqli_real_escape_string($conn,$_POST['id']);
   $paymode= mysqli_real_escape_string($conn,$_POST['paymode']);
   //$amo=$amount;
    $dis=$requesed_amount*5/100;
    $tds=$requesed_amount*5/100;
    $admin=$requesed_amount*10/100;
    $total_dedcut=$tds+$admin;
    $paid_amount=$requesed_amount-$total_dedcut;
    $data_inserted=mysqli_query($conn,"INSERT INTO withdrawal_list (`uname`,`amount`,`paid_amt`,`paymode`,`admin`,`tds`,`date`) values('$userid','$amount','$paid_amount','$paymode','$admin','$tds',NOW())")or die(mysqli_error($conn));
   
   //updae pin request status
   $data_updated=mysqli_query($conn,"UPDATE withdrawal_request SET status='Approved ',paid='$paid_amount',tds='$tds',admin='$admin',paymode='$paymode' WHERE id='$id' limit 1")or die(mysqli_error($conn));
   // echo $de=$fv['wallet'];
   // echo $re=$fv['amount'];
   
   
   echo '<script>alert("Money transfer successfully.");window.location.assign("withdrawal_req.php");</script>';    
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
               <?php include"header.php"; ?> 
               <div class="col_1">
                  <div class="clearfix"> </div>
               </div>
               <div class="span_11">
                  <div class="row">
                     <div class="col-lg-12">
                        <br><br>
                        
                        <form action="#" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <label>UserId</label>
                                    <input type="text" name="userid" value="<?php echo $fv['uname'] ?>"  class="form-control" required=" " readonly>
                                 </div>
                                 <div class="col-sm-3">
                                    <label>Wallet Amount</label>
                                    <input type="text" name="wallet" value="<?php echo $wallet; ?>" class="form-control"   required=" " readonly >
                                 </div>
                                 <div class="col-sm-3">
                                    <label>Requested Amount</label>
                                    <input type="text" name="amount"  class="form-control" value="<?php echo $req_amt; ?>"  required=" " readonly>
                                    <input type="hidden" name="id" value="<?php echo $fv['id'] ?>">
                                 </div>
                                 <div class="col-sm-3">
                                    <label>Payment Mode</label>
                                    <select name="paymode" class="form-control">
                                       <option value="NEFT">NEFT </option>
                                       <option value="RTGS">RTGS </option>
                                       <option value="IMPS ">IMPS </option>
                                       <option value="CASH ">CASH </option>
                                       <option value="CHECK">CHECK </option>
                                       <option value="GooglePay">GooglePay </option>
                                       <option value="CreditCard">CreditCard</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <hr>
                           <input type="submit" name="send" class="btn-primary" value="Pay Now">
                        </form>
                     </div>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   </body>
  
</html>