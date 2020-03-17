<?php include'header.php'; ?>
<style type="text/css">
   #users_wallet_check_message{
      color: white;
      padding: 4px 4px 4px 15px;
      display: none;
   }
   #users_wallet_check_message.error{
      background: #ff6a48;
   }
   #users_wallet_check_message.success{
      background: #539c53;
   }
</style>
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
   <form id="sale_product">
         <div class="row">
            <div class="col-md-6">
               <div class="row">
                  <div class="col-md-5">
                     Retails Sales Date:
                  </div>
                  <div class="col-md-7">
                     <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="datepicker-autoclose" value="<?=date('Y-m-d');?>" placeholder="yyyy-mm-dd">
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="col-md-6">
               <div class="row">
                  <div class="col-md-6">
                     <input type="checkbox" name="tax" value="Inclusive Tax" checked><label style="font-size: 10px;">Inclusive Tax</label>
                  </div>
                  <div class="col-md-6">
                     <input type="checkbox" name="tax" value="Include IGST"><label style="font-size: 10px;">Include IGST</label> 
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
        

         <div class="row">
            <div class="col-md-6">   
            <div class="row"  style="margin-bottom: 5px;">
                  <div class="col-md-6">
                     <h5>Customer Name:</h5>
                  </div>
                  <div class="col-md-6">
                     <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Customer Name" required>
                  </div>                  
               </div>     
               <div class="row"  style="margin-bottom: 5px;">
                  <div class="col-md-6">
                     <h5>Customer Mobile No.:</h5>
                  </div>
                  <div class="col-md-6">
                     <input type="text" name="customer_mobile_number" id="customer_mobile_number" class="form-control" placeholder="Customer Mobile No." required>
                  </div>                  
               </div>      
            </div>
            <div class="col-md-6">  
               <div class="row"  style="margin-bottom: 5px;">
                  <div class="col-md-6">
                     <h5 style="float: right;">Total:</h5>
                  </div>
                  <div class="col-md-6">
                     <input type="text" name="grand_total" id="grand_total" class="form-control" readonly>
                  </div>                  
               </div>
               <div class="row" style="margin-bottom: 5px;">
                  <div class="col-md-6">
                     <h5 style="float: right;">Total Amount(After Discount) :</h5>
                  </div>
                  <div class="col-md-6">
                      <input type="text"  class="form-control" id="total_amount" placeholder="Total Amount" name="total_amount" required>   
                  </div>                  
               </div>
               <div class="row" style="margin-bottom: 5px;">
                  <div class="col-md-6">
                     <h5 style="float: right;">MLM User :</h5>
                  </div>
                  <div class="col-md-6">
                     <div class="input-group">
                        <div class="custom-control custom-radio">
                           <input type="radio" class="custom-control-input manage_mlm_user" id="mlm_user_yes" name="is_mlm_user" value="1" >
                           <label class="custom-control-label" for="mlm_user_yes">Yes</label>
                        </div>&nbsp;&nbsp;
                        <div class="custom-control custom-radio">
                           <input type="radio" class="custom-control-input manage_mlm_user" id="mlm_user_no" name="is_mlm_user" value="0" checked>
                           <label class="custom-control-label" for="mlm_user_no">No</label>
                        </div>

                     </div>
                  </div>                  
               </div>
               <div id="mlm_user_details" style="display: none;">
                  <div class="row" style="margin-bottom: 5px;">
                     <div class="col-md-6">
                        <!-- <h5 style="float: right;"></h5> -->
                     </div>
                     <div class="col-md-6">
                         <input type="text"  class="form-control" id="user_id" placeholder="User Id" name="user_id">   
                     </div>                  
                  </div>
                  <div class="row" style="margin-bottom: 5px;">
                     <div class="col-md-6">
                        <!-- <h5 style="float: right;"</h5> -->
                     </div>
                     <div class="col-md-6" style="display: -webkit-inline-box;">
                         <input type="text"  class="form-control col-md-6" id="users_total_wallet_balance_used" placeholder="Wallet Balance" name="users_total_wallet_balance_used" value="0.00" readonly> &nbsp;
                         <a href="Javascript:void(0);" class="btn btn-info btn-xs" style="position: relative;top: 10%;" id="change_wallet_balance">Change Wallet Balance</a>  
                     </div>                  
                  </div>
                  <div class="row">
                     <div class="col-md-6"></div>
                     <div class="col-md-6">
                        <div id="users_wallet_check_message" class="success">Invalid user id</div><br>
                     </div>
                  </div>
               </div>
               <div class="row" style="margin-bottom: 5px;">
                  <div class="col-md-6">
                     <h5 style="float: right;">Amount Paid :</h5>
                  </div>
                  <div class="col-md-6">
                      <input type="text"  class="form-control" id="total_amount_to_be_paid" placeholder="Amount Paid" name="total_amount_to_be_paid" readonly required>   
                  </div>                  
               </div>
            </div>            
         </div>

      </div>
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4"></div>
         <div class="col-md-4">
             <input type="hidden" name="type" value="sale_product">
             <a href=""onclick="Javascript:var PopUpWin = window.open(&#39;invoice.php&#39;,&#39;_blank&#39;,&#39;width=1000,height=680,title=yes,toolbar=no,location=no,resizable=no,status=no&#39;);return false;"><button class="btn btn-info">Save & Print</button></a>
            <button class="btn btn-info" id="sale">Save</button>
            <button class="btn btn-warning">Reset</button>
         </div>
      </div>
   </form>
   </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>