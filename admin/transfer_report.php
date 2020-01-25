
<?php 
session_start();
include('connection.php');
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
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
    
      <!-- search by date -->
                <div class="row">
                  <div class="col-lg-12">
                   

                        <!-- search by id -->

                        <!-- end -->
                         

                        <!-- end -->
<!-- <button onclick="exportTableToExcel('tblData')" class="btn-default">Export Data To Excel File</button><br> -->
                        <div class="table-responsive" id="search">
                            
                        <table class="table table-bordered table-striped" id="tblData">
                            <tr style="background-color: #00b6c8;  border: 1px solid black; color:#fff;">
                                <th>S.n.</th>
                                <th>Sponsar Id</th>                                
                                <th>Amount</th>
                                                             
                                  
                                <th>Date of Transfer</th>
                                
                                 
                            </tr>
                            <?php 
                           // $email="";
                            $i=1;
                            $query = mysqli_query($conn,"SELECT * FROM `withdrawal_list` WHERE `status`='1' ");
                              //$qu=mysqli_num_rows($query);
                            if([$query]>0)
                            {
                                while($row= mysqli_fetch_assoc($query)){
                                
                                    $name=$row['uname'];
                                ?>
                                    <tr>
                                           <td><?php echo $i; ?> </td>
                                           <td><?php echo $row['uname']; ?></td>
                                           <td><?php echo $row['amount']; ?></td>
                                           
                                           <td><?php echo $row['date']; ?></td>
                                           
                                        
                                    </tr>
                                <?php
                                    $i++;
                                }
                            }
                           
                            ?>
                        </table>
                    </div>
 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/export.js"></script>
    <!-- Script -->
<script>
$(document).ready(function(){
  $.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd'
  });
  $(function(){
    $("#From").datepicker();
    $("#to").datepicker();
  });
  $('#range').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
    if(From != '' && to != '')
    {
      $.ajax({
        url:"range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#search').html(data);
        }
      });
    }
    else
    {
      alert("Please Select the Date");
    }
  });
});

// search by id

$(document).ready(function(){
  
  
  $('#search_id').click(function(){
    var id = $('#id').val();
    
    if(id != '')
    {
      $.ajax({
        url:"range.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          $('#search').html(data);
        }
      });
    }
    else
    {
      alert("Please Enter the Sponsar id");
    }
  });
});
</script>

</body>
</html>
