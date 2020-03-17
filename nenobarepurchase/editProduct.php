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
                            <div class="card-body">  
                                <center><h4>Product Details</h4></center><br>
                            <div class="row">

                                 <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="position-bottom-left">Product Name</label>
                                    <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="" placeholder="Enter Product Name" required>
                                </div>                      
                                 </div>
                                 <div class="col-md-6">
                                      <div class="form-group">
                                    <label for="position-top-right">MRP Price</label>
                                    <input type="number" id="position-top-right" class="form-control demo" data-position="top right" value="" placeholder="Enter MRP Price" required>
                                </div>                        
                                 </div>                           
                            </div>  
                             <div class="row">

                                 <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="position-bottom-left">NKB Price</label>
                                    <input type="number" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="" placeholder="Enter NKB Price" required>
                                </div>                      
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                    <label for="position-bottom-left">Product Image</label>
                                    
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            
                                        
                                    </div>
                                </div>                    
                                 </div>                           
                            </div>  
                             <div class="row">
                                 <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="position-top-right">Quantity</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="" placeholder="Enter Quantity" required>
                                </div>                           
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="position-top-right">Status</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="" placeholder="Enter Status" required>
                                </div>                              
                                 </div>                           
                            </div> 
                             <div class="row">
                                 <div class="col-md-6">
                                    <label class="m-t-15">Manufacturing Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>                            
                                 </div>
                                 <div class="col-md-6">
                                    <label class="m-t-15">Expiry Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="datepicker-autoclose1" placeholder="mm/dd/yyyy">
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
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation1">Yes</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation2">No</label>
                                    </div>
                                </div>                            
                                 </div>
                                 <div class="col-md-6">
                                                                
                                 </div>                           
                            </div>
                                  
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <center><button type="submit" class="btn btn-success">Update Product</button></center>
                                   
                                </div>
                            </div>
                        </div>
                        

                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php include 'footer.php'; ?>