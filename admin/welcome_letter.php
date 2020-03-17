
<?php
session_start();
require('connection.php');
if (isset($_GET['user_id'])) 
{
   $uname = $_GET['user_id'];
}


$sql=mysqli_query($conn,"SELECT * FROM user where user_id='$uname'");
$row=mysqli_fetch_assoc($sql);
$name=$row['user_name'];
$sponsar=$row['sponsor_id'];
$email=$row['email'];
$mobile=$row['mobile'];
$doj=$row['date_joining'];
?>




</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php //include "sidebar.php";  ?>

            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">
      



    <div class="">
      <div id="">
            <div class="container-fluid">
              
           
                <!-- /.row -->
                <div class="row well">
                	 <div class="col-md-12" id="printableArea">
                                <div class="panel">
                                  
                                    <div class="panel-body table-responsive">
                                        <table>
                <tbody>

                <tr>
                    <td>&nbsp;
                        
                    </td>
                    <td colspan="2" align="right" background="images/regis_centre.jpg" class="centerbg_regis">&nbsp;
                        
                    </td>
                    <td align="right" background="images/regis_centre.jpg" class="centerbg_regis">&nbsp;
                        
                    </td>
                    <td>&nbsp;
                        
                    </td>
                </tr>
                
                <tr>
                    <td colspan="5">
                        <div id="print" class="table-responsive">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr>
                                    <td style="border-bottom:5px solid #000; margin-bottom:10px;">&nbsp;
                                        
                                    </td>
                                    <td width="20%" align="center" style="border-bottom:5px solid #000; margin-bottom:10px;">
                                        <img src="../images/logo/logo1.png"  style="max-width:100px;">
                                    </td>
                                    <td width="55%" align="center" style="border-bottom:5px solid #000; margin-bottom:10px;">
                                        <span class="doneprojects_font style2"><span class="style4">
                                            </span><br>
                                            <span class="style1"></span></span>
                                    </td>
                                    <td align="center" style="border-bottom:5px solid #000; margin-bottom:10px;">&nbsp;
                                        
                                    </td>
                                    <td style="color:#164500;border-bottom:5px solid #000; margin-bottom:10px;">
                                        <p style="margin-bottom: 0;line-height: 20px;font-size: 14px;">
                                        <strong>Nenoba Kirana Bazar</strong><br>
                                         Mumbai,Maharashtra<br>
                                        Ph. +91 - 0987654321
                                        Support@nenobakiranabazar.com<br>
                                        www.nenobakiranabazar.com</p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;
                                        
                                    </td>
                                    <td colspan="5" class="centerbg_regis">
                                        <p align="justify" class="matter_rpt" style="margin-bottom:0; font-weight:800; margin-top:10px;">
                                            Dear <span id="spIdentity1">Member</span>,</p>
                                    </td>
                                    <td class="centerbg_regis">&nbsp;
                                        
                                    </td>
                                    <td>&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;
                                        
                                    </td>
                                    <td colspan="5" align="left">
                                       
                                            <div style="width: 100%; float: left;">
                                                <table width="100%" border="0" align="left" cellpadding="1" cellspacing="1" class="button">
                                                  
                                                    <tbody><tr>
                                                        <td width="30%">
                                                            User Id
                                                        </td>
                                                        <td width="2%" align="center" class="button">
                                                            :
                                                        </td>
                                                        <td width="68%">
                                                            &nbsp;<?php echo $uname; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Name
                                                        </td>
                                                        <td align="center" class="button">
                                                            :
                                                        </td>
                                                        <td>
                                                            &nbsp;<?php echo $name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Sponsor Id
                                                        </td>
                                                        <td align="center" class="button">
                                                            :
                                                        </td>
                                                        <td>
                                                            &nbsp;<?php echo $sponsar; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email Id
                                                        </td>
                                                        <td align="center" class="button">
                                                            :
                                                        </td>
                                                        <td>
                                                            &nbsp;<?php echo $email; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Mobile No.
                                                        </td>
                                                        <td align="center" class="button">
                                                            :
                                                        </td>
                                                        <td>
                                                            &nbsp;<?php echo $mobile; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Date of Joining
                                                        </td>
                                                        <td align="center" class="button">
                                                            :
                                                        </td>
                                                        <td>
                                                            &nbsp;<?php echo $doj; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td align="center" class="button">
                                                        </td>
                                                        <td>&nbsp;
                                                            
                                                        </td>
                                                    </tr>

<tr>
<td colspan="3">
<strong>Congratulations!</strong>
<p style="width:100% !important; text-align:justify;">Welcome to the family of Nenoba Kirana Bazar. Thank you for joining us. Now you are part of a wonderful business opportunity for a bright future. We are sure that our extraordinary products and services will complement your lifestyle and take care of all your needs. </p>

<p style="width:100% !important; text-align:justify;">We have commenced upon a journey which has been remarkable so far and our pre launch has been a huge success beyond our expectations.  </p>

<p style="width:100% !important; text-align:justify;">
<strong>Taking care of your life from all sides:</strong>
</p>
<p style="width:100% !important; text-align:justify;">Our motto is to take care of all the required needs of human life and to spread happiness all around. We take care of your Health, your Lifestyle, your Holidays and thus make your life more enjoyable. Take the best use of our products, services and plan for a Great Success and Better Future. We always strive for excellence. We are here to lead, guide and accompany you, towards your world of success.</p>

<p style="width:100% !important; text-align:justify;">Believe that your Yes to Nenoba Kirana Bazar is your Yes to Prosperity and better health.  On this journey to success, and better health, feel free to consult your Team Leader or our nearest Branch offices. We are available round the clock to support you.</p>

<p style="width:100% !important; text-align:justify;">Once again, Welcome to Nenoba Kirana Bazar family of prosperous and health conscious distributors. </p>
<p style="width:100% !important; text-align:justify;">Coming together is a Beginning, Keeping together is Progress and Working together is success in Nenoba Kirana Bazar. </p>

<p style="width:100% !important;">
<strong>With Winning Regards,</strong><br>
<strong>Director</strong><br><br><br>
<strong>Nenoba Kirana Bazar</strong>
</p>
</td>
</tr>

                                                </tbody></table>
                                            </div>


                                    </td>
                                    <td>&nbsp;
                                        
                                    </td>
                                    <td>&nbsp;
                                        
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </td>
                </tr>
               
                <tr>
                    <td>&nbsp;
                        
                    </td>
                    <td colspan="2" align="center">
                        
                                &nbsp;&nbsp;&nbsp;
                                <table width="98%" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr><td width="50%">
                                    
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                    <td align="center">&nbsp;
                        
                    </td>
                    <td>&nbsp;
                        
                    </td>
                </tr>
            </tbody></table>
                                    </div>
                                </div>
                            </div>
                            <center><input  type="button" onclick="printDiv('printableArea')" class="btn btn-success" value="Print"></center>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

		<div class="clearfix"> </div>
	    </div><br>
		<?php //include "footer.php"; ?>
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
 <script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
     
}
  </script>

</body>
</html>
