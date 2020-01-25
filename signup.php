<?php 
session_start(); 
include 'header.php'; 
if(isset($_POST['submit'])){
    $post_array = $_POST;
    $sponsarid=$_POST['sponsor_id'];
    $sponsarname=$_POST['sponsor_name'];
    $username=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $pancard=$_POST['pancard']; 
    $_SESSION['session_flash'] = array(
                                    'sponsor_id' => $sponsarid,
                                    'sponsor_name' => $sponsarname,
                                    'name' => $username,
                                    'email' => $email,
                                    'mobile' => $mobile,
                                    'pancard' => $pancard
                                );
}
?>
   <script type="text/javascript">  
        /* Function to Generat Captcha */  
        function GenerateCaptcha() {  
            var chr1 = Math.ceil(Math.random() * 10) + '';  
            var chr2 = Math.ceil(Math.random() * 10) + '';  
            var chr3 = Math.ceil(Math.random() * 10) + '';  
  
            var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
            var captchaCode = str + chr1 + ' ' + chr2 + ' ' + chr3;  
            document.getElementById("txtCaptcha").value = captchaCode  
        }  
  
        /* Validating Captcha Function */  
        function ValidCaptcha() {  
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);  
            var str2 = removeSpaces(document.getElementById('txtCompare').value);  
  
            if (str1 == str2) 
            {
                document.getElementById("myForm").action = "front_function.php";
                
                return false;
            }
            else
            {
                alert("Please enter a valid captcha.");
                return false;
            }
        }  
  
        /* Remove spaces from Captcha Code */  
        function removeSpaces(string) {  
            return string.split(' ').join('');  
        }  
    </script>    
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper"  style="background-image: url(images/bg-top.png);">
             <div style="background-color: #00000073;">
            <!-- Start Wishlist Area -->
            <div class="login-section section-padding">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-md-6 col-md-offset-3 well">
                            <div class="registered-customers">
                                <div class="section-title text-uppercase mb-40">
                                    <h4>NEW REGISTRATION</h4>
                                </div>
                                <div id="msg"> </div>
                                <form id="myForm" method="post">
                                    <div class="login-account p-30 box-shadow">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Sponsor Id"  name="sponsor_id" id="sponsor_id" onchange="showCustomer(this.value)" value="<?=!empty($_SESSION['session_flash']['sponsor_id'])?$_SESSION['session_flash']['sponsor_id']:'';?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="txtHint">
                								 <input type="text" placeholder="Sponsor Name" name="sponsor_name" value="<?=!empty($_SESSION['session_flash']['sponsor_name'])?$_SESSION['session_flash']['sponsor_name']:'';?>" required>
            									</div>
                                            </div>
                                            <div class="col-sm-6">
                                                 <input type="text" placeholder="Name" name="name" value="<?=!empty($_SESSION['session_flash']['name'])?$_SESSION['session_flash']['name']:'';?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email Id" name="email" value="<?=!empty($_SESSION['session_flash']['email'])?$_SESSION['session_flash']['email']:'';?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" placeholder="Mobile No." name="mobile" value="<?=!empty($_SESSION['session_flash']['mobile'])?$_SESSION['session_flash']['mobile']:'';?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Pan Card" name="pancard" value="<?=!empty($_SESSION['session_flash']['pancard'])?$_SESSION['session_flash']['pancard']:'';?>" required>
                                            </div>
                                   

                                            <div class="col-sm-6">
                                                <div class="icon1">
                        <span class="fa fa-refresh" style="cursor: pointer;" id="btnrefresh" onclick="GenerateCaptcha();" ></span>
                         <input type="text" id="txtCaptcha" style="text-align: center; border: none; font-weight: bold; font-size: 20px; font-family: Modern; " disabled /> 
                    </div>
                                            </div>
                                            <div class="col-sm-6">
                                               <div class="icon1">
                        <span class="fa fa-codepen"></span>
                          <input type="text" placeholder="Enter the Captcha Text" id="txtCompare" />  
                    </div>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <center>
                                                   <div class="bottom">
                        <button class="btn btn-success" id="btnValid" value="Submit" onclick="ValidCaptcha()" name="submit">Register</button>
                    </div>

                                                </center>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- End Of Wishlist Area -->

<?php unset($_SESSION['session_flash']);?>
<?php include"footer.php"; ?>
<script>
	$("#register").click(function(){
		var sponsor_id=$("#sponsor_id").val();
		var sponsor_name=$("#sponsor_name").val();
		var name=$("#name").val();
		var email=$("#email").val();
		var mobile=$("#mobile").val();
		var country=$("#country").val();
		var pan=$("#pan").val();
		alert();return false;
// 		if (sponsor_id=='') {alert('Sponsor id is missing');}
// 		if (sponsor_name=='') {alert('Sponsor name is missing');}
// 		if (name=='') {alert('User name is missing');}
// 		if (email=='') {alert('Email id missing');}
// 		if (country=='') {alert('Country is missing');}
// 		if (pan=='') {alert('Pan Card is missing');}
		

		$.ajax({
			url:"front_function.php?type=register",
			type:"POST",
			data:{
				sponsor_id:sponsor_id,
				sponsor_name:sponsor_name,
				name:name,
				email:email,
				mobile:mobile,
				country:country,
				pan:pan
				
			},
			success:function(result){
				$("#msg").html(result);
				// $("#sponsor_id").val('');
				// $("#sponsor_name").val('');
				// $("#name").val('');
				// $("#email").val('');
				// $("#mobile").val('');
				// $("#country").val('');
				// $("#pan").val('');
				
			}
		});
	});
</script>
<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getcustomer.php?q="+str, true);
  xhttp.send();
}
</script>
<script type="text/javascript">
    $(document).on('input', function (e) {
  $("#sponsor_id").val($("#sponsor_id").val().toUpperCase());
});
</script>