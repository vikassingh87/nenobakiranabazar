 <?php 
session_start();
$user_id=$_SESSION['userid'];
include("../connection.php");

                       function generate_payout($user_id){
                        $left_ids_array = array();
                        $right_ids_array = array();
                         $myid=$_SESSION['userid'];
                        global $conn,$left_count_payout,$right_count_for_payout,$left_ids_array,$right_ids_array,$a,$b,$left_b,$right_b;
                          $total_left_count = getCount_new($user_id,'left');
                          $total_right_count = getCount_new($user_id,'right');
                         //print_r($left_ids_array);
                         //print_r($right_ids_array);

                           //left
                          if($left_ids_array>=1)
                         {
                        foreach($left_ids_array as $value)
                        {
                        $query_1="SELECT * from user where uname ='$value'";
                        $result_1=mysqli_query($conn,$query_1);
                        //$pac='';
                        //$a='0';
                        while($fetch_1=mysqli_fetch_assoc($result_1))
                        {
                          if($fetch_1['package'] != 'Cr')
                          {
                             $a[] =$fetch_1['package'].'<br>';
                           }
                        }
                        }

                         $left_b=array_sum($a);
                      }
                        //right
                        if($right_ids_array>=1)
                        {


                        foreach($right_ids_array as $value)
                        {
                        $query_2="SELECT * from user where uname ='$value'";
                        $result_2=mysqli_query($conn,$query_2);
                        //$pac='';
                        //$arr=array();
                        while($fetch_2=mysqli_fetch_assoc($result_2))
                        {
                          if($fetch_2['package'] != 'Cr')
                          {
                            $b[] =$fetch_2['package'];
                            
                          }
                        }
                         
                        }
                        $right_b=array_sum($b);
                        
                      }
                      else{

                      }
                    
                     
                      //echo $up="UPDATE user set left_business='$left_b, right_business='$right_b' where uname='$myid'";
                    $update=mysqli_query($conn,"UPDATE `user` SET `left_business`='$left_b', `right_business`='$right_b' where `uname`='$myid'");
                     
                      

                        $total_payout = 0;
                          $myid=$_SESSION["userid"];
                        $query="select count(*) as count from user where under_userid='$myid' and status='1'";
                        $result=mysqli_query($conn,$query);
                        $fetch=mysqli_fetch_assoc($result);
                        $count=$fetch['count'];
                        $query1="select * from user where uname='$myid'";
                        $result1=mysqli_query($conn,$query1);
                        $fetch1=mysqli_fetch_assoc($result1);
                        $package=$fetch1['package'];
                        // echo $total_left_count;
                        // echo $total_right_count;
                        $left_package_sum = $right_package_sum = 0;$total_package_sum = 0;
                        if($count>=2){
                           //echo "Total Left Count : ".$total_left_count;
                          // echo "<br>Total Right Count : ".$total_right_count;
                          if($total_left_count>=2 && $total_right_count>=1){
                               $uid = "'".$left_ids_array[0]."','".$left_ids_array[1]."'";unset($left_ids_array[0],$left_ids_array[1]);
                            $sql = mysqli_query($conn,"SELECT * FROM user WHERE uname IN ($uid)") or die(mysqli_error($conn));
                            while($data = mysqli_fetch_assoc($sql)){
                                 //echo $data['package'];
                              if($data['package'] !='Cr'){
                                  $left_package_sum += $data['package'];
                              }
                            }
                            $uid = "'".$right_ids_array[0]."'";unset($right_ids_array[0]);
                            $sql1 = mysqli_query($conn,"SELECT * FROM user WHERE uname IN ($uid)") or die(mysqli_error($conn));
                            while($data = mysqli_fetch_assoc($sql1)){
                                // echo $data'package'];
                              if($data['package'] !='Cr'){  
                                  $right_package_sum += $data['package'];
                              }
                            }

                          }
                            else if($total_left_count>=1 && $total_right_count>=2){
                                   $uid1= "'".$right_ids_array[0]."','".$right_ids_array[1]."'";unset($right_ids_array[0],$right_ids_array[1]);
                            $sql = mysqli_query($conn,"SELECT * FROM user WHERE uname IN ($uid1)") or die(mysqli_error($conn));
                            while($data = mysqli_fetch_assoc($sql)){
                              if($data['package'] !='Cr'){
                                  $right_package_sum += $data['package'];
                              }
                            }
                            $uid = "'".$left_ids_array[0]."'";unset($left_ids_array[0]);
                            $sql = mysqli_query($conn,"SELECT * FROM user WHERE uname IN ($uid)") or die(mysqli_error($conn));
                            while($data = mysqli_fetch_assoc($sql)){
                              if($data['package'] !='Cr'){
                                $left_package_sum += $data['package'];
                              }
                            }
                          }
                         if ($total_left_count>=2 && $total_right_count>=1 || $total_left_count>=1 && $total_right_count>=2) 
                         {
                           
                         
                          if($left_b == $right_b){
                              $total_package_sum = ($left_b*10)/100;
                           echo $dis=$total_package_sum*90/100;
                          }
                          else if($left_b<$right_b){
                              $total_package_sum = ($left_b*10)/100;
                             echo $dis=$total_package_sum*90/100;
                          }
                          else if($right_b<$left_b){
                               $total_package_sum = ($right_b*10)/100;
                              echo $dis=$total_package_sum*90/100;
                          }

                          $new_left_ids_array = $new_right_ids_array = array();
                          if(count($left_ids_array)>0){
                            foreach ($left_ids_array as $key => $value) {
                               $new_left_ids_array[] = $value;
                            }
                          }
                          if(count($right_ids_array)>0){
                            foreach ($right_ids_array as $key => $value) {
                              $new_right_ids_array[] = $value;
                            }
                          }
                           }
                          else
                          {
                            echo "0";
                          }
                        
                         }
                       // return $total_package_sum;
                      }
                      function getCount_new($user_id,$side){
                        global $conn,$left_count_payout,$right_count_for_payout,$left_ids_array,$right_ids_array;
                        $sql = mysqli_query($conn,"SELECT * FROM user WHERE parent_id='$user_id' AND side = '$side'") or die(mysqli_error($conn));
                        $left_count_payout += 0;
                        $right_count_for_payout += 0;
                        if(mysqli_num_rows($sql)){
                          $row = mysqli_fetch_assoc($sql);
                          $first_right_child = $row['uname'];
                          // echo "<pre>";
                          // print_r($row);
                          if($row['status'] == 1){
                            if($side == 'left'){
                              $left_count_payout += 1;
                              $left_ids_array[] = $row['uname'];
                            }
                            else{
                              $right_count_for_payout += 1;
                              $right_ids_array[] = $row['uname'];
                            }
                          }
                          getChild_new($first_right_child,$side);
                        }
                        if($side == 'left'){
                          return $left_count_payout;
                        }
                        else{
                          return $right_count_for_payout;
                        }
                        // return $count;
                      }
                      function getChild_new($parent_id,$side){
                        global $conn,$left_count_payout,$right_count_for_payout,$left_ids_array,$right_ids_array;
                        $sql = "SELECT uname,status FROM user WHERE parent_id = '$parent_id'";
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($query)){
                          $first_right_child = $row['uname'];
                          if($row['status'] == 1){
                            if($side == 'left'){
                              $left_ids_array[] = $row['uname'];
                              $left_count_payout +=  1;
                            }
                            else{
                              $right_ids_array[] = $row['uname'];
                              $right_count_for_payout += 1;
                            }
                          }
                          getChild_new($first_right_child,$side);
                        }
                      }

                         echo generate_payout($user_id);
                      ?>