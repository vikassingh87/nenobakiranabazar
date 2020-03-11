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
                        <h4 class="page-title">All Stock</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Stock</li>
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
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>MRP Price</th>
                                                <th>NKB Price</th>
                                                <th>Quantity</th>
                                                <th>Product Image</th>
                                                <th>Manufacturing Date</th>
                                                <th>Expiry Date</th>
                                                <th>In Stock</th>                                               
                                                <th>Publish</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                <th>Print Barcode</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 11px;">
                                            <?php
                                            $sql = "SELECT * FROM product_details";
                                            $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                            if(mysqli_num_rows($query) > 0){
                                                $i = 1;
                                                while($result = mysqli_fetch_assoc($query)){ extract($result);?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td></td>
                                                <td><?=$product_code;?></td>
                                                <td><?=$product_name;?></td>
                                                <td><?=$product_price;?></td>
                                                <td><?=$product_nkb_price;?></td>
                                                <td><?=$product_quantity;?></td>
                                                <td><?=!empty($product_image)?'<a href="../uploads/products/'.$product_image.'" target="_blank"><img src="../uploads/products/'.$product_image.'" height="50" width="50"></a>':'';?></td>
                                                <td><?=!empty($product_manufacturing_date)?date('d-m-Y',strtotime($product_manufacturing_date)):'';?></td>
                                                <td><?=!empty($product_expiry_date)?date('d-m-Y',strtotime($product_expiry_date)):'';?></td>
                                                <td><?=($product_in_stock == 1)?'Yes':'No';?></td>
                                                <td><?=($product_publish == 1)?'Yes':'No';?></td>                                                
                                                <td><?=date('d-m-Y',strtotime($created_date));?></td>
                                                <td>
                                                    <a href="addProduct.php?id=<?=$id;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs deleteProduct" data-id="<?=$id;?>"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-info btn-xs"><i class="fa fa-print"></i> </a></td>
                                            </tr>
                                                <?php } 
                                            }
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