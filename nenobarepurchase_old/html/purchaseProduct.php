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
                                    <li class="breadcrumb-item active" aria-current="page">Purchase Product</li>
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
                                    <label for="position-top-right">Price</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="" placeholder="Enter Price" required>
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
                                    <label for="position-top-right">Category</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="" placeholder="Enter Category" required>
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
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>                            
                                 </div>                           
                            </div>
                            <hr>   
                           
                                <center><h4>Client Details</h4></center><br>
                                 <div class="row">
                                 <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="position-bottom-left"> Name</label>
                                    <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="" placeholder="Enter Name" required>
                                </div>                      
                                 </div>
                                 <div class="col-md-6">
                                      <div class="form-group">
                                    <label for="position-top-right">Mobile No.</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="" placeholder="Enter Mobile No." required>
                                </div>                        
                                 </div>                           
                            </div>  
                             <div class="row">
                                 <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="position-bottom-left">Email Id</label>
                                    <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="" placeholder="Enter Email Id" required>
                                </div>                      
                                 </div>
                                 <div class="col-md-6">
                                      <div class="form-group">
                                    <label for="position-top-right">Address</label>                              
                                    <textarea class="form-control demo" placeholder="Enter Address" required></textarea>
                                </div>                        
                                 </div>                           
                            </div>
                            <div class="row">
                                 <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="position-bottom-left">GST No.</label>
                                    <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="" placeholder="Enter GST No." required>
                                </div>                      
                                 </div>
                                 <div class="col-md-6">
                                      <div class="form-group">
                                    <label for="position-top-right">Payment Type</label>
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option>Select Payment Type</option>
                                            <option value="">Cash</option>
                                             <option value="">Credit</option>
                                             <option value="">Online</option>
                                             <option value="">Check</option>
                                        </select>
                                </div>                        
                                 </div>                           
                            </div>                            
                                                   
                                
                                
                                
                               
                                
                                
                                
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <center><button type="submit" class="btn btn-success">Purchase</button></center>
                                   
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