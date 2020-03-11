<?php include'header.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-md-4">Retails Sales ID:BB087 </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
               <input type="text" name="barcode" id="addProductByBarCode" placeholder="Barcode..." class="form-control" style="float: right;">
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-md-4">
               <div class="row">
                  <div class="col-md-5">
                     Retails Sales Date:
                  </div>
                  <div class="col-md-7">
                     <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="row">
                  <div class="col-md-4">
                     Customer:  
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control"  value="" placeholder="Customer Name" required> 
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="row">
                  <div class="col-md-6">
                     <input type="checkbox" name="" checked><label style="font-size: 10px;">Inclusive Tax</label>
                  </div>
                  <div class="col-md-6">
                     <input type="checkbox" name=""><label style="font-size: 10px;">Include IGST</label> 
                  </div>
               </div>
            </div>
         </div>
         <br>
         <div class="table-responsive">
            <table id="cart_table" class="table table-striped table-bordered">
               <thead style="font-size: 11px;">
                  <tr>
                     <th>Barcode</th>
                     <th>Product Name</th>
                     <th>MRP Price</th>
                     <th>NKB Price</th>
                     <th>Discount</th>
                     <th>Quantity</th>
                     <th>Gross Total</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody style="font-size: 11px;">
                
               </tbody>
            </table>
         </div>
         <div class="table-responsive">
            <table id="grand_total_table" class="table table-striped table-bordered">
               <thead style="font-size: 11px;">
                  <tr>
                     <th>Final Amount</th>
                     <th>Discount In %</th>
                     <th>Discount In Rs.</th>
                     <th>Amount Received</th>
                     <th>Return Balance</th>
                     <th>Amount Paid</th>
                     <th>Balance</th>
                     <th colspan="2">Total</th>
                  </tr>
               </thead>
               <tbody style="font-size: 11px;">   
               </tbody>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4"></div>
         <div class="col-md-4">
            <button class="btn btn-info">Save & Print</button>
            <button class="btn btn-info">Save</button>
            <button class="btn btn-warning">Reset</button>
         </div>
      </div>
   </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>