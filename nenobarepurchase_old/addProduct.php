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
         <h4 class="page-title">Purchase Products</h4>
         <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
            <form id="add_product">
               <div class="card-body">
                  <center>
                     <h4>Product Details</h4>
                  </center>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="product_name">Product Name</label>
                           <input type="text" id="" class="form-control" data-position="bottom left" name="product_name" value="<?=!empty($product_info['product_name'])?$product_info['product_name']:'';?>" placeholder="Enter Product Name" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="product_price">MRP Price</label>
                           <input type="number" id="product_price" class="form-control" data-position="top right" name="product_price" value="<?=!empty($product_info['product_price'])?$product_info['product_price']:'';?>" placeholder="Enter MRP Price" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="pproduct_nkb_price">NKB Price</label>
                           <input type="number" id="pproduct_nkb_price" class="form-control" data-position="bottom left" name="product_nkb_price" value="<?=!empty($product_info['product_nkb_price'])?$product_info['product_nkb_price']:'';?>" placeholder="Enter NKB Price" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="product_image">Product Image</label>
                           <div class="custom-file">
                              <input type="file" name="product_image" class="custom-file-input" id="product_image">
                              <label class="custom-file-label" for="product_image">Choose file...</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="product_quantity">Quantity</label>
                           <input type="text" id="product_quantity" class="form-control" data-position="top right" name="product_quantity" value="<?=!empty($product_info['product_quantity'])?$product_info['product_quantity']:'';?>" placeholder="Enter Quantity" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="position-top-right">Publish</label>
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
                  <div class="row">
                     <div class="col-md-6">
                        <label class="m-t-15">Manufacturing Date</label>
                        <div class="input-group">
                           <input type="text" class="form-control" id="product_manufacturing_date" name="product_manufacturing_date"  value="<?=!empty($product_info['product_quantity'])?date('m/d/Y',strtotime($product_info['product_manufacturing_date'])):'';?>" placeholder="mm/dd/yyyy">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label class="m-t-15">Expiry Date</label>
                        <div class="input-group">
                           <input type="text" class="form-control" id="product_expiry_date" name="product_expiry_date"  value="<?=!empty($product_info['product_quantity'])?date('m/d/Y',strtotime($product_info['product_expiry_date'])):'';?>" placeholder="mm/dd/yyyy">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label class="m-t-15">In Stock</label>
                        <div class="input-group">
                           <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="product_in_stock_yes" name="product_in_stock" value="1" checked>
                              <label class="custom-control-label" for="product_in_stock_yes">Yes</label>
                           </div>
                           &nbsp;&nbsp;
                           <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="product_in_stock_no" name="product_in_stock" value="0">
                              <label class="custom-control-label" for="product_in_stock_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                     </div>
                  </div>
               </div>
               <div class="border-top">
                  <div class="card-body">
                     <center>
                        <input type="hidden" name="type" value="add_product">
                        <input type="hidden" name="id" value="<?=isset($product_info['id'])?$product_info['id']:'';?>">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-success">Add Product</button>
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