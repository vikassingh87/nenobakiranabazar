


    <?php 
    include('connection.php');
    session_start();
   if (isset($_GET['id'])) {
       
   
       $id=$_GET['id'];
        if($id!="")
        {
             // $delquery="delete from user_reg where id='$id'";
             // $rec= mysqli_query($conn, $delquery);

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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">
        <div class="graphs">
     
      <div class="col_1">
        <center><h2>Registered Users</h2></center>
		    <div class="row">
 <div class="col-md-4">
<input type="text" name="userid" id="userid" class="form-control" placeholder="Search by User Id"/>
</div>
<div class="col-md-8">
<input type="button" name="search_id" id="search_userid" value="Search" class="btn btn-success"/>
</div>
</div>
<!-- end -->
                    
                        <br><br>
                        <div class="table-responsive" id="searchbyid">
                           <table id="table_id"  class="table table-bordered table-striped">
                               <thead>
                            <tr style="background-color: #00b6c8;    border: 1px solid black; color:#fff;">
                                <th>Sr.No</th>
                                
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>Sponsar Id</th>
                                <th>Email Id</th>
                                 <th>User Mobile No</th>
                                 <th>Password</th>
                                  <th>Date of Joining</th>
                                    <!-- <th>Bank Details</th> -->
                                    <th>Operations</th>
                            </tr>
                            </thead>
                            <?php 
                           // $email="";
                            $i=1;
                            $query = mysqli_query($conn,"select * from user where status='0' order by id desc");
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_array($query)){
                                /*  $amount = $row['amount'];
                                    $date = $row['date'];
                                    $status = $row['status'];*/
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?> </td>
                                         
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo $row['sponsor_id']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['date_joining']; ?></td>
                                        <td><a href="edit_red.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                                          
                                          
                                    </tr>
                                <?php
                                    $i++;
                                }
                            }
                            else{
                            ?>
                                
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                   
	  
		
		</div>
    <?php include "footer.php"; ?>
       </div>

      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // search by id

$(document).ready(function(){
  
  
  $('#search_userid').click(function(){
    var id = $('#userid').val();
    
    if(id != '')
    {
      $.ajax({
        url:"search.php",
        method:"POST",
        data:{id1:id},
        success:function(data)
        {
          $('#searchbyid').html(data);
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
