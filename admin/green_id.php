<?php 
include('connection.php');
session_start();   
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nenoba Kirana Bazar| Admin</title>
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
<!-- <script
  src="https://code.jquery.com/jquery-1.9.1.min.js"
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script> -->
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      
         <?php include "sidebar.php";  ?>
            <!-- /.navbar-static-side -->
        
        <div id="page-wrapper">
            
        <div class="graphs">
     <div class="row">
         <div class="col-md-2">
             <h3 style="font-size:19px;">Non Payment Id's</h3>
       </div>
       <div class="col-md-2">
      <button style="background-color:#fc9006;height:30px;width:30px;" disabled></button>
       </div>
       <div class="col-md-2">
            <h3 style="font-size:19px;">Block Id's</h3>
       </div>
       <div class="col-md-2">
      <button style="background-color:red;height:30px;width:30px;" disabled></button>
       </div>
    </div>
      <div class="col_1">
          
        <center><h2>Active Users</h2></center>


                        
                          
                        <div class="table-responsive" id="searchbyid">
                           <table id="table_id" class="table table-bordered table-striped" style="border: 1px solid black;" >
                            <thead>
                            <tr style="background-color: #00b6c8; border: 1px solid black; color:#fff;">
                                <th>S.n.</th>
                                
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>Sponsar Id</th>
                                <th>Email Id</th>
                                 <th>User Mobile No</th>
                                 <th>Password</th>
                                  <th>Package</th>
                                  <th>Date of Joining</th>
                                  <th>KYC Details</th>
                                  <th>Operations</th>
                                  <th>Print</th>
                            </tr>
                            </thead>
                            <?php 
                           // $email="";
                            $i=1;
                            $query = mysqli_query($conn,"SELECT * FROM user WHERE status='1' and id!=1 order by id desc");
                            
                                while($row=mysqli_fetch_assoc($query))
                                {
                                  $paymode = $row['payment_mode'];
                                  if($paymode=='2')
                                  {
                                    $color='red';
                                  }
                                  elseif($paymode=='1')
                                  {
                                    $color='#fc9006';
                                  }
                                  else
                                  {
                                    $color='';
                                  }
                                ?>
                                    <tr style="background-color:<?php echo $color; ?>">
                                        <td><?php echo $i; ?> </td>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo $row['sponsor_id']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['package']; ?></td>
                                        <td><?php echo $row['date_joining']; ?></td>
                                        <td><a href="acc_view.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-primary btn-xs">View</a></td>
                                        <td><a href="edit.php?id=<?php echo $row['id']; ?>" class='btn btn-danger btn-xs'>Edit/Block Id</a></td>
                                        <td><a href="" onclick="Javascript:var PopUpWin = window.open(&#39;welcome_letter.php?user_id=<?php echo $row['user_id']; ?>&#39;,&#39;_blank&#39;,&#39;width=1000,height=680,title=yes,toolbar=no,location=no,resizable=no,status=no&#39;);return false;" class="btn btn-primary btn-xs">Welcome Letter</a>

                                          <!-- <a href="" onclick="Javascript:var PopUpWin = window.open(&#39;idcard.php?user_id=<?php echo $row['user_id']; ?>&#39;,&#39;_blank&#39;,&#39;width=1000,height=680,title=yes,toolbar=no,location=no,resizable=no,status=no&#39;);return false;" class="btn btn-danger btn-xs">Id card</a> -->

                                        </td>
                                    </tr>
                                  
                                  
                                <?php $i++; } ?>
                                
                            
                        </table>
                </div>
			
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
        data:{id:id},
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
