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
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead style="font-size: 11px;">
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
                                            $i=1;
   
                                            $query=mysqli_query($conn,"SELECT * FROM purchase_details where order_purchase_id=$_GET[id]") or die(mysqli_error($conn));
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                extract($row);
                                               
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$bar_code?></td>
                                                    <td><?=$product_name?></td>
                                                    <td><?=$product_price?></td>
                                                    <td><?=$product_nkb_price?></td>
                                                    <td><?=$quantity?></td>
                                                    <td><?=$discount?></td>
                                                    <td><?=$sub_total?></td>
                                                    
                                                </tr>
                                           <?php $i++; }
                                            ?>
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