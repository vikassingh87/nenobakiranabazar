<?php include'header.php'; ?>
<<<<<<< HEAD
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
                        <h4 class="page-title">Expired Product`s</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Expired Product`s</li>
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
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                                <th>MRP Price</th>
                                                <th>NKB Price</th>
                                                <th>Manufacturing Date</th>
                                                <th>Expiry Date</th>
                                                <th>Available Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 11px;">
                                           
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
=======

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Expired Product`s</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Expired Product`s</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
       <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="row">                                
                            <div class="col-md-6">
                               <label class="m-t-15">From Date</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                   <input type="text" class="form-control" id="from_date" name="from_date"  value="" placeholder="yyyy-mm-dd">                                       
                                </div> 
                            </div>
                            <div class="col-md-6">
                               <label class="m-t-15">To Date</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                   <input type="text" class="form-control" id="to_date" name="to_date" value="" placeholder="yyyy-mm-dd">                                       
                                </div> 
                            </div>
                        </div>                            
                    </div>
                    <div class="col-md-3"></div>
                </div> <br>               
                <div class="table-responsive">
                    <table id="expired_report" class="table table-striped table-bordered">
                        <thead style="font-size: 11px;">
                            <tr>
                                <th>Sr.</th>                                                
                                <th>Product Code</th>
                                <th>Barcode</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>MRP Price</th>
                                <th>NKB Price</th>
                                <th>Manufacturing Date</th>
                                <th>Expiry Date</th>
                                <th>Available Quantity</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 11px;">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>     
    </div>
           
>>>>>>> dev
<?php include 'footer.php'; ?>