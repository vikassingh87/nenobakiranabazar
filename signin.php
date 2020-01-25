<?php include 'header.php'; ?>
        <!-- Start Breadcrumbs Area -->
      
        <!-- End Of Breadcrumbs Area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper" style="background-image: url(images/bg-top.png);">
            <div style="background-color: #00000073;">
            <!-- Start Wishlist Area -->
            <div class="login-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 well">
                            <div class="registered-customers">
                                <div class="section-title text-uppercase mb-40">
                                    <h4>LOGIN</h4>
                                </div>
                                <div id="msg"> </div>
                                <form action="front_function.php" method="post">
                                    <div class="login-account p-30 box-shadow">
                                        <p>If you have an account with us, Please log in.</p>
                                      <input type="text" placeholder="User Name" id="nick" name="name" required=""/>
                                       <input type="password" placeholder="Password" name="password" required=""/>
                                        
                                        <center><button class="btn btn-success" name="login">Log In</button></center>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
            <!-- End Of Wishlist Area -->

           
<?php include"footer.php"; ?>


 <script type="text/javascript">
    $(document).on('input', function (e) {
  $("#nick").val($("#nick").val().toUpperCase());
});
</script>