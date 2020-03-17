<?php include'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Sales Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               <div class="card">
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table id="sales_report" class="table table-striped table-bordered">
                                        <thead style="font-size: 11px;background-color: #27a9e3;color: #ffffff;">
                                            <tr>
                                                <th>Sr.</th>
                                                <th>User Id</th>
                                                <th>Customer Name</th>
                                                <th>Mobile</th>                                                
                                                <th>Wallet Balance Used</th>
                                                <th>Total Amount Paid</th>
                                                <th>Total Amount</th>
                                                <th>Date</th>                                        
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 11px;" >
                                            <?php
                                            $i=1;
   
                                            $query=mysqli_query($conn,"SELECT * FROM order_purchase") or die(mysqli_error($conn));
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                extract($row);
                                                if($user_id=='')
                                                {
                                                    $uid='Non NKB User';
                                                }
                                                else
                                                {
                                                    $uid=$user_id;  
                                                }
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$uid?></td>
                                                    <td><?=$customer_name?></td>
                                                    <td><?=$customer_mobile_number?></td>
                                                    <td><?=$users_total_wallet_balance_used?></td>
                                                    <td><?=$total_amount_to_be_paid?></td>
                                                    <td><?=$total_amount?></td>
                                                    <td><?=$created_date?></td>
                                                    <td><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#view_details_modal_<?=$i?>">View Details</a>

                                    <!-- Modal -->
                                <div class="modal fade" id="view_details_modal_<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Purchase Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                        <thead style="font-size: 11px;background-color: #27a9e3;color: #ffffff;">
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Barcode</th>                                               
                                                <th>Product Name</th>                           
                                                <th>MRP Price</th>
                                                <th>NKB Price</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 11px;">
                                            <?php
                                            $j=1;
   
                                            $sql=mysqli_query($conn,"SELECT * FROM purchase_details where order_purchase_id=$id") or die(mysqli_error($conn));
                                            while($data=mysqli_fetch_assoc($sql))
                                            {
                                                extract($data);
                                               
                                                ?>
                                                <tr>
                                                    <td><?=$j?></td>
                                                    <td><?=$bar_code.'<br>'; 
                                                    echo $barcode_img= '<img class="barcode" alt="'. $bar_code.'" src="barcode.php?text='. $bar_code.'&codetype=code128&orientation=horizontal&size=20&print=true"/>';?></td>
                                                    <td><?=$product_name?></td>
                                                    <td><?=$product_price?></td>
                                                    <td><?=$product_nkb_price?></td>
                                                    <td><?=$quantity?></td>
                                                    <td><?=$discount?></td>
                                                    <td><?=$sub_total?></td>
                                                    
                                                </tr>
                                           <?php $j++; }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                    </td>

                               
                                                </tr>
                                           <?php $i++; }?>
                                           
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        get_sale_report();
    })
</script>