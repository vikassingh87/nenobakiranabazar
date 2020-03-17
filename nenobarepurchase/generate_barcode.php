<?php include'header.php'; ?>
<?php

$product_info = array();
if(isset($_GET['id']) && !empty($_GET['id'])){
   $id = $_GET['id'];
   $product_info = get_product_by_id($id);
}

?>
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
         <h4 class="page-title">Barcode Generate</h4>
         <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Barcode Generate</li>
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
   <div class="row">
      <div class="col-md-8 offset-md-2">
         <div class="card">
            <form id="add_product" autocomplete="off">
               <div class="card-body">
                  <center>
                     <h4>Product Details</h4>
                  </center>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="product_name">Product Name</label>
                           <select name="product_type" class="form-control">
                              <option value="">---Select *---</option>
                              <?php 
                                 $sql=mysqli_query($conn,"SELECT * FROM product_details")or die(mysqli_error($conn));
                                 while($row=mysqli_fetch_assoc($sql)){
                              ?>  
                              <option value="<?=$row['id'];?>"><?=$row['product_name'];?></option>                              
                           <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="pproduct_nkb_price">NKB Price</label>
                           <input type="number" id="pproduct_nkb_price" class="form-control" data-position="bottom left" name="product_nkb_price" value="" placeholder="Enter NKB Price" required>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row"> 
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="product_quantity">Quantity</label>
                           <input type="text" id="product_quantity" class="form-control" data-position="top right" name="product_quantity" value="" placeholder="Enter Quantity" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="m-t-15">Publish</label>
                           <div class="input-group">
                              <div class="custom-control custom-radio">
                                 <input type="radio" class="custom-control-input" id="product_publish_yes" name="product_publish" value="1" checked>
                                 <label class="custom-control-label" for="product_publish_yes">Yes</label>
                              </div>
                              &nbsp;&nbsp;
                              <div class="custom-control custom-radio">
                                 <input type="radio" class="custom-control-input" id="product_publish_now" name="product_publish" value="0">
                                 <label class="custom-control-label" for="product_publish_now">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="border-top">
                  <div class="card-body">
                     <center>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-success">Generate Barcode</button>
                     </center>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
