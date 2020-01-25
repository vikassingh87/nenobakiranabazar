<?php
session_start();
include 'connection.php';
 $myid=$_SESSION['SuperId'];

$sql=mysqli_query($conn,"select * from user where id='$myid'");
$res=mysqli_fetch_assoc($sql);
$uname=$res['user_id'];
$name=$res['user_name'];
$doj=$res['date_joining'];
$mobile=$res['mobile'];
$sponsarid=$res['sponsor_id'];
$password=$res['password'];
?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
    Nenoba Kirana Bazar  :: Signup Success
</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<link rel="stylesheet" href="css/demo.css" />
<link rel="stylesheet" href="css/sky-forms.css" />
<link rel="stylesheet" href="css/sky-forms-red.css" />
</head>
<body class="bg-cyan">
<div class="body">
 <center><a href="index.php" target=""> <img src="images/logo/logo1.png" style="padding-top:15px;max-width: 80px;" /> </a></center> 
<div class="sky-form">
<header>Signup :: Success</header>
<fieldset>                  
<div class="row">

<table width="100%">
<tr>
<td align="center">
    
    <div id="gendiv" align="center">
    
        <table width="100%">        
        <tr>
            <td  align="center">
                
<br />
<div align="center">
<table width="100%">
<tr>
<td align="center">

    <table width="90%">
    <tr>
        <td align="center" >
            <span style="font-size: 15pt; color:#248A0F; font-style:italic;" ><strong>Congratulations </strong></span>!!! 
            <br />
            Registration completed successfully!
        </td>
    </tr>
     <tr>
        <td align="center">
            Welcome to <strong><span style="color: #cc0066">Nenoba Kirana Bazar</span><span
                style="font-size: 12px; color: red"> </span></strong>! We wish you a great success
            and assure you
            &nbsp; that you will enjoy being a part of our successful Organization!
        </td>
    </tr>
    </table>

</td>
</tr>
<tr>
<td align="center">

    <table width="60%">
    <tr>
        <td colspan="2" align="center">
            <span style="font-size: 13pt; font-weight:bold;">
               :: Your Registration Details ::
            </span>
        </td>
    </tr>
    <tr>
        <td align="right" width="50%">
            User ID :</td>
        <td  align="left" width="50%">
            <span  style="font-weight:bold;"><?php echo $uname; ?></span></td>
    </tr>
   
    <tr>
        <td align="right" width="50%">
            Password :</td>
        <td  align="left" width="50%">
            <span  style="font-weight:bold;"><?php echo $password; ?></span></td>
    </tr>
   <tr>
        <td align="right" >
            Full Name :</td>
        <td align="left">
            <span  style="font-weight:bold;"><?php echo $name; ?></span></td>
    </tr>
     <tr>
        <td align="right" >
            Joining Date :</td>
        <td align="left">
            <span style="font-weight:bold;"><?php echo $doj; ?></span></td>
    </tr>
    <tr>
        <td align="right">
            Mobile No :</td>
        <td align="left">
            <span  style="font-weight:bold;"><?php echo $mobile; ?></span></td>
    </tr>
   <tr>
        <td align="right" >
            Sponsor ID :</td>
        <td  align="left">
            <span style="font-weight:bold;"><?php echo $sponsarid; ?></span></td>
    </tr>
    
    <tr><td colspan="2">&nbsp;</td></tr>    
    </table>

</td>
</tr>

<tr>
<td align="center">

    &nbsp;

</td>
</tr>
<tr>
<td align="center">

    <span style="font-size: 14pt; color:#248A0F;">Once Again Congratulation.</span>

</td>
</tr>
<tr>
<td align="center">

    &nbsp;

</td>
</tr>
</table>
</div>
            </td>
        </tr>
        <tr>
            <td width="100%" align="center">
                <span id="lblMessage" style="display:inline-block;color:Red;width:100%;"></span>
            </td>
        </tr>        
        </table>

    </div>

    <table align="center" >
        <tr>    
            <td align="center" valign="top">
                <a href="signin.php"><input type="button" value="Go To Login" class="button" /></a>
                
                    <a href="signup.php" class="button">Register</a>
            </td>
            
        </tr>    
   </table>
   
</td>
</tr>
</table>
                    </div>
                </fieldset>
            </div>

    

    </div>


</body>
</html>