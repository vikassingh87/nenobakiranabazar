<?php 
    include('connection.php');
    session_start();


       
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
        
        
                  <div class="col-lg-12">
                      <br><br>
                        <div class="row">
                          <div class="col-lg-4"></div>

                    <div class="col-lg-4 well">
                       <center><h2 style="color: #00b6c8;">Id TOPUP</h2></center>
                        <form id='package_upgrade'>
                         
                            <div class="form-group">
                                 <label style="color: #0e0e0e;"><b>Topup Id</b></label>
                                <input type="text" name="topup" id="topup" class="form-control" value="" required  onchange="showCustomer(this.value)">
                            </div>
                            <div class="form-group">
                              <label style="color: #0e0e0e;"><b>Package</b></label>
                               <div id="txtHint">
                                <input type="text" name="package" id="package" class="form-control" value="" required></div>
                            </div>
                             <div class="form-group">
                              <label style="color: #0e0e0e;"><b>Topup Amount</b></label>
                                <input type="text" name="amount" id="amount" class="form-control" value="" required>
                            </div>
                           
                            <div class="form-group">
                            <center><input type="submit" id="" class="btn btn-primary" value="Topup"></center>
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
//id upgrade...//
$(document).ready(function(){
  $('#package_upgrade').submit(function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    formdata.append('type','package_update')
    $.ajax({
      url:'ajax.php',
      type:'POST',
      data:formdata,
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success:function(data_result){
        console.log(data_result);
        alert('id upgrade sucessfully');
        window.open('dashboard.php');
      }
    })
  })
})
//end of id upgrade....//
</script>
</body>
</html>
