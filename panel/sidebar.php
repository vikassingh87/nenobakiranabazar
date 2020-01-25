      <?php
       include_once('../connection.php');
     ?> 
    <style type="text/css">
        a.noclick       {
  pointer-events: none;
}
    </style>
      <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="font-style: italic !important;">NENOBA <span style="color:#08f1e9;">KIRANA</span>BAZAR</a>
            </div>
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    
                    
                    <ul class="nav" id="side-menu">
                        

                        <li>
                            <a href="index.php"><i class="fa fa-desktop nav_icon"></i>Dashboard</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-user nav_icon"></i>My Account<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="profile_view.php">Profile</a>
                                </li>
                                <li>
                                    <a href="change_password.php">Change Password</a>
                                </li>
                                <li>
                                    <a href="user_payment_report.php">Payment Report</a>
                                </li>
                                <li>
                                    <a href="welcome_letter.php">Welcome Letter</a>
                                </li>
                                 <li>
                                    <a href="idcard.php">ID Card</a>
                                </li>
                            
                          </ul>
                                </li>
                            
                           <li>
                            <a href="active.php"><i class="fa fa-user nav_icon"></i>Active Ids</a>
                           </li>
                        <li>
                         <a href="acc.php"><i class="fa fa-bank nav_icon"></i>Fillup KYC Details<span class="fa arrow"></span></a></li>
                        <!--   <li>
                            <?php 
                                 $day= date('d');
                                if ($day=='11' || $day=='21' || $day>='01') 
                                {
                                    $href='withdral.php';
                                }
                                else
                                {
                                    $href="javascript:void(0);";
                                }
                             ?>
                         <a href="<?php echo $href; ?>"><i class="fa fa-bank nav_icon"></i>Withdrawal <span class="fa arrow"></span></a></li> -->
                          
                      
                              <li>
                            <a href="#"><i class="fa fa-users"></i>Active Id Team<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="self_team.php">Direct Team</a>
                                </li>
                            
                            </ul>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="self_all_team.php">My Team</a>
                                </li>
                            
                            </ul>
                            
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-users"></i>Registerd Id Team<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="self_registerd.php">Direct Team</a>
                                </li>
                            
                            </ul>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="self_all_registerd.php">My Team</a>
                                </li>
                            
                            </ul>
                            
                        </li>


                   

                         <li>
                            <a href="#"><i class="fa fa-exchange nav_icon"></i>Manage E-Pin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view.php">View Pin</a>
                                </li>
                              <!--   <li>
                                    <a href="#">Used Pin</a>
                                </li> -->
                                 <li>
                                    <a href="getpin.php">E-Pin Request</a>
                                </li>
                               
                            </ul>
                           
                        </li>
                      
                           
                     
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out nav_icon"></i>Logout</a>
                         
                        
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
