<?php 
    include('connection.php');
    session_start();

   // $id=$_GET['sponsarid'];

       
       if(isset($_POST['send'])){
    $userid = mysqli_real_escape_string($conn,$_POST['userid']);
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
   $id = mysqli_real_escape_string($conn,$_POST['id']);
  
     mysqli_query($conn,"insert into withdrawal_list (`uname`,`amount`) values('$userid','$amount')");
    
    //updae pin request status
    mysqli_query($conn,"update withdrawal_request set status='Approved ' where id='$id' limit 1");
    
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
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
                        <div class="table-responsive">
                     <!--  <h2>Basic Implementation</h2> -->
                <table border="2"  class="table" id="table_id">
                     <thead>
                    <tr style="background-color: #00b6c8; color:#fff;">
                        <th>Srno.</th>
                         <th>User Id</th>
                        <th>Requested Amount</th>
                        <th>Requested Date</th>
                        <th>Bank</th>
                        <th>Ifsc Code</th>
                        <th>Branch</th>
                        <th>Account No.</th>
                      
                        <th>Status</th>
                        <th>Action</th>
                         </tr>
                         </thead>
                        <?Php
                          $i=1; 
                    $data="select * from withdrawal_request where status='Pending' ";
                   $query=mysqli_query($conn,$data);
                   if([$query] > 0)
                   {
                    
while($rec=mysqli_fetch_array($query))
{
?>

                
                <tr>
                     <td><?php echo $i; ?></td>
                      <td><?php echo $rec['uname']; ?></td>
                    <td><?php echo $rec['amount']; ?></td>
                    <td><?php echo $rec['request_date'];?></td>
                    
                    <td><?php echo $rec['bank_name'];?>
                    <td><?php echo $rec['ifsc'];?></td>
                    <td><?php echo $rec['branch_name'];?></td>
                    <td><?php echo $rec['acc_no'];?></td>
                    
                   
                    <td><?php echo $rec['status'];?></td>
                    <td><a href="pay_mode.php?id=<?php echo $rec['id'];?>">Pay</td>
                  <!--  <form method="post">
                                                    <input type="hidden" name="userid" value="<?php echo $rec['uname']; ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $rec['amount']; ?>">
                                                     <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">
                                                    <td><input type="submit" name="send" value="Send" class="btn btn-primary"></td>
                                                </form>
                     -->
                    </tr>     
<?php $i++; } } ?>





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
        </script>
        <script>
//     $(document).ready(function() {
//     $('#table_id').DataTable( {
//         responsive: true
//     } );
// } );

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#table_id thead tr').clone(true).appendTo( '#table_id thead' );
    $('#table_id thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#table_id').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>
</body>
</html>
