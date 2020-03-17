<?php 
   //include("roi_income.php");
    include('count_function.php');
    // include('all_team.php');
   include_once("../connection.php");
   //include_once('../sponsar_income.php');
   // include("demo_roi.php");
   // include('current_wallet.php');
    //include('new_income.php');
   // include('wallet_amount.php');
   // include("test_count.php");
   $myid=$_SESSION['userid'];
   $query=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$myid'");
   $fetch=mysqli_fetch_assoc($query);
   $userid=$fetch['user_id'];
   $mobile=$fetch['mobile'];
   $package=$fetch['package'];
   $date=$fetch['date_joining'];
   $date1=$fetch['active_date'];
   $email=$fetch['email'];
   $sponsar=$fetch['sponsor_id'];
   $name=$fetch['user_name'];
   $status=$fetch['status'];
   $payout_info = get_payout_info($myid);
   $user_info = get_user_info($myid);
   // for e-wallet

   ?>
<style type="text/css" media="screen">
   @media only screen and (min-width: 768px){}
   .form-horizontal .control-label {
   padding-top: 0px;
   margin-bottom: 0;
   text-align: right;
   }
   }
   .control-label {
   color: deeppink;
   }
   .card-body:last-child {
   border-radius: 0 0 2px 2px;
   }
   .card-body {
   padding: 10px 24px 14px 24px;
   position: relative;
   }
   .card-head {
   border-radius: 2px 2px 0 0;
   border-bottom: 1px dotted rgba(0,0,0,0.2);
   padding: 2px;
   color: #3a405b;
   font-size: 14px;
   font-weight: 600;
   line-height: 40px;
   min-height: 40px;
   }
   .card-box {
   background: #fff;
   min-height: 50px;
   box-shadow: none;
   position: relative;
   margin-bottom: 20px;
   transition: .5s;
   border: 1px solid #f2f2f2;
   border-radius: 0;
   padding: 0 20px;
   }
   .card-head header {
   display: inline-block;
   padding: 11px 20px;
   vertical-align: middle;
   line-height: 17px;
   font-size: 20px;
   }
   .form-group1 {
   margin-bottom: 0;
   }
</style>
<h5>WELCOME : <?php echo $name; ?></h5>
<div class="card card-box" style='background-color: #ffffff;'>
   <div class="card-head">
      <!-- <div class="text" style="background:#00bfffbd;">
         <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="color: #fff; font-size: 22px; height: 35px; padding-top: 4px;"><p>::: First ROI withdrawal  after 40 days ::: Second ROI withdrawal  after 30 days :::</p> 
         
         </marquee>
         </div> -->
      <header>Personal Details</header>
   </div>
   <div class="card-body " id="bar-parent1">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="form-horizontal">
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblDistributorId" class="col-sm-4 control-label" style="color:#00BFFF;"><b>USERID :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_txtDistributorId"><?php echo $userid;?></span>
                  </div>
               </div>
               <?php 
                  if($status=='1')
                  {
                     $pag='Green Id';
                  }
                  
                  else
                  {
                    
                     $pag='Red Id';
                  }
                  ?> 
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblPackage1" class="col-sm-4 control-label"style="color:#00BFFF;"><b>Status :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_lblPackage"><?php echo $pag;?></span>
                  </div>
               </div>
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_Label1" class="col-sm-4 control-label"style="color:#00BFFF;"><b>SponsorID :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_lblSponsorid"><?php echo $sponsar;?></span>
                  </div>
               </div>
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblMobileNO" class="col-sm-4 control-label"style="color:#00BFFF;"><b>My Rank :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_txtMobileNO"><?=get_current_rank($myid);?></span>
                  </div>
               </div>
               <?php 
               $current_fund_eligibility = get_current_fund_eligibility($myid);
               if($current_fund_eligibility != ''){
               ?>
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblMobileNO" class="col-sm-4 control-label"style="color:#00BFFF;"><b>Eligible For :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_txtMobileNO"><?=$current_fund_eligibility;?> </span>
                  </div>
               </div>
              <?php } ?>
            </div>
         </div>
         <div class="col-md-6 col-sm-6">
            <div class="form-horizontal">
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblJoinDate" class="col-sm-4 control-label"style="color:#00BFFF;"><b>Activation Date :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_txtJoinDate"><?php echo $date;?></span>
                  </div>
               </div>
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblBirthDate" class="col-sm-4 control-label"style="color:#00BFFF;"><b>Email :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_txtEmail"><?php echo $email;?></span>
                  </div>
               </div>
               <div class="form-group1 row">
                  <span id="ctl00_ContentPlaceHolder1_lblMobileNO" class="col-sm-4 control-label"style="color:#00BFFF;"><b>MobileNo :</b></span>
                  <div class="col-sm-8">
                     <span id="ctl00_ContentPlaceHolder1_txtMobileNO"><?php echo $mobile;?></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<div class="col_3">
  <div class="col-md-3 widget widget1">
       <a href="green_red_id.php">
          <div class="r3_counter_box">
             <i class="pull-left"><img src="images/grp.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >Direct Team</strong></h5>
                <h5 style="font-size: 13px;"><?php echo $user_info['my_direct_team_count']; ?></h5>
             </div>
          </div>
       </a>
    </div>
  <div class="col-md-3 widget widget1">
       <a href="#">
          <div class="r3_counter_box" style="background-color:#2F4F4F;">
             <i class="pull-left"><img src="images/grp.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >My Team</strong></h5>
                <h5 style="font-size: 13px;"><?php echo $user_info['my_team_count']; ?></h5>
             </div>
          </div>
       </a>
    </div>
  <div class="col-md-3 widget widget1">
       <div class="r3_counter_box" style="background-color:#708090;">
          <i class="pull-left"><img src="images/rupee.png" width="60px" height="60px"></i>
          <div class="stats">
             <h5 style="font-size: 14px;"><strong >Direct Referral Income</strong></h5>
             <h5 style="font-size: 13px;"><?= number_format($payout_info['referral_payout_amount'],2);?></h5>
             <!--  <h6 style="font-size: 14px;"><strong >Sponsar Income</strong></h6> -->
            <!--/<h6 style="font-size: 13px;color:#ffffff;"> -->
                <?php 
                   //  $payu=generate_payout($_SESSION['userid']);
                   //  $sponser_income = Sponsar_income();
                   // echo $add=$payu+$sponser_income;
                   //  $_SESSION['income']=$add;
                   //  $_SESSION['payout']=$payu;
                   
                   ?>
             <!--</h6>-->
          </div>
       </div>
    </div>
  <div class="col-md-3 widget">
          <div class="r3_counter_box" style="background-color:#114c93;">
             <i class="pull-left"><img src="images/investment.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >Level Income</strong></h5>
                <h5 style="font-size: 13px;"><?= number_format($payout_info['level_payout_amount'],2);?></h5>
             </div>
          </div>
       </div>
</div>
<div class="col_3">
  <div class="col-md-3 widget widget1">
          <div class="r3_counter_box" style="background-color:#28334f;">
             <i class="pull-left"><img src="images/investment.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >Direct Referral Bonus</strong></h5>
                <h5 style="font-size: 13px;"><?= number_format($payout_info['direct_referral_payout_amount'],2);?></h5>
             </div>
          </div>
       </div>
  <div class="col-md-3 widget widget1">
          <div class="r3_counter_box" style="background-color:#28334f;">
             <i class="pull-left"><img src="images/investment.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >Performance Bonus</strong></h5>
                <h5 style="font-size: 13px;"><?= number_format($payout_info['performance_payout_amount'],2);?></h5>
             </div>
          </div>
       </div>
  <div class="col-md-3 widget widget1">
          <div class="r3_counter_box" style="background-color:#1E90FF;">
             <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >Traveling Fund</strong></h5>
                <h5 style="font-size: 13px;">00</h5>
             </div>
          </div>
       </div>
  <div class="col-md-3 widget">
          <div class="r3_counter_box" style="background-color:#CD853F;">
             <i class="pull-left"><img src="images/rupee.png" width="60px" height="60px"></i>
             <div class="stats">
                <h5 style="font-size: 14px;"><strong >Bike Fund</strong></h5>
                <h5 style="font-size: 13px;"><?php echo "00"; ?></h5>
             </div>
          </div>
      </div>
</div>
<div class="col_3">
  <div class="col-md-3 widget widget1">
  <div class="r3_counter_box" style="background-color:#686664
         ;">
         <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
         <div class="stats">
            <h5 style="font-size: 14px;"><strong >Car Fund</strong></h5>
            <h5 style="font-size: 13px;"><?php echo "00";?></h5>
         </div>
      </div>
  </div>
  <div class="col-md-3 widget widget1">
      <div class="r3_counter_box" style="background-color:#686664
         ;">
         <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
         <div class="stats">
            <h5 style="font-size: 14px;"><strong >House Fund</strong></h5>
            <h5 style="font-size: 13px;"><?php echo "00";?></h5>
         </div>
      </div>
   </div>
  <div class="col-md-3 widget widget1">
      <div class="r3_counter_box" style="background-color:#686664
         ;">
         <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
         <div class="stats">
            <h5 style="font-size: 14px;"><strong >Company Profit</strong></h5>
            <h5 style="font-size: 13px;"><?php echo "00";?></h5>
         </div>
      </div>
   </div>
  <div class="col-md-3 widget ">
      <div class="r3_counter_box" style="background-color:#686664 ;">
         <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
         <div class="stats">
            <h5 style="font-size: 14px;"><strong >Wallet</strong></h5>
            <h5 style="font-size: 13px;"><?php echo "00";?></h5>
         </div>
      </div>
   </div>
 
</div>
<div class="col_3">
   <div class="col-md-3 widget widget1">
      <div class="r3_counter_box"  style="background-color:#114c93;">
         <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
         <div class="stats">
            <h5 style="font-size: 14px;"><strong >Repurchase wallet</strong></h5>
            <h5 style="font-size: 13px;"><?php echo $user_info['e_wallet'];?></h5>
         </div>
      </div>
  </div>
</div>
<div class="col_3">
   <div class="col-md-3 widget widget1">
      <div class="r3_counter_box"  style="background-color:#114c93;">
         <i class="pull-left"><img src="images/total.png" width="60px" height="60px"></i>
         <div class="stats">
            <h5 style="font-size: 14px;"><strong >Repurchase Payout</strong></h5>
            <h5 style="font-size: 13px;"><?php echo $payout_info['repurchase_payout_amount_business_value'];?></h5>
         </div>
      </div>
  </div>
</div>
<script type="text/javascript">
   document.getElementById("date").innerHTML = formatAMPM();
   
   function formatAMPM() {
   var d = new Date(),
   minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
   hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
   ampm = d.getHours() >= 12 ? 'pm' : 'am',
   months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
   days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
   return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
   }
</script>
