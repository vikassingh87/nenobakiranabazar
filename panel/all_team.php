 <?php
    // session_start();
      $uname = $_SESSION["userid"];
    // include('../connection.php');
    
    $team_array = array();
    $sql = "SELECT * FROM user WHERE user_id!= '$uname' and sponsor_id='$uname' and status!='0'";
    $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_affected_rows($conn)>0){
      while($data = mysqli_fetch_assoc($query)){
        $team_array[] = $data;
        //print_r($data);
        $sql2 = "SELECT * FROM user WHERE user_id!= '$data[user_id]' and sponsor_id='$data[user_id]' and status!='0'";
        $query2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0){
          while($data2 = mysqli_fetch_assoc($query2)){
            $team_array[] = $data2;
            //print_r($data2);
            $sql3 = "SELECT * FROM user WHERE user_id!= '$data2[user_id]' and sponsor_id='$data2[user_id]' and status!='0'";
            $query3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            if(mysqli_affected_rows($conn)>0){
              while($data3 = mysqli_fetch_assoc($query3)){
                $team_array[] = $data3;

                 $sql4 = "SELECT * FROM user WHERE user_id!= '$data3[user_id]' and sponsor_id='$data3[user_id]' and status!='0'";
                 $query4 = mysqli_query($conn,$sql4) or die(mysqli_error($conn));
                 if(mysqli_affected_rows($conn)>0){
                  while($data4 = mysqli_fetch_assoc($query4)){
                   $team_array[] = $data4;

                      $sql5 = "SELECT * FROM user WHERE user_id!= '$data4[user_id]' and sponsor_id='$data4[user_id]' and status!='0'";
                      $query5 = mysqli_query($conn,$sql5) or die(mysqli_error($conn));
                      if(mysqli_affected_rows($conn)>0){
                       while($data5 = mysqli_fetch_assoc($query5)){
                        $team_array[] = $data5;

                        $sql6 = "SELECT * FROM user WHERE user_id!= '$data5[user_id]' and sponsor_id='$data5[user_id]' and status!='0'";
                        $query6 = mysqli_query($conn,$sql6) or die(mysqli_error($conn));
                        if(mysqli_affected_rows($conn)>0){
                         while($data6 = mysqli_fetch_assoc($query6)){
                          $team_array[] = $data6;

                          $sql7 = "SELECT * FROM user WHERE user_id!= '$data6[sponsor_id]' sponsor_id='$data6[user_id]' and status!='0'";
                          $query7 = mysqli_query($conn,$sql7) or die(mysqli_error($conn));
                          if(mysqli_affected_rows($conn)>0){
                           while($data7 = mysqli_fetch_assoc($query7)){
                            $team_array[] = $data7;

                            $sql8 = "SELECT * FROM user WHERE user_id!= '$data7[sponsor_id]' sponsor_id='$data7[user_id]' and status!='0'";
                            $query8 = mysqli_query($conn,$sql8) or die(mysqli_error($conn));
                            if(mysqli_affected_rows($conn)>0){
                             while($data8 = mysqli_fetch_assoc($query8)){
                              $team_array[] = $data8;

                              $sql9 = "SELECT * FROM user WHERE user_id!= '$data8[sponsor_id]' sponsor_id='$data8[user_id]' and status!='0'";
                              $query9 = mysqli_query($conn,$sql9) or die(mysqli_error($conn));
                              if(mysqli_affected_rows($conn)>0){
                               while($data9 = mysqli_fetch_assoc($query9)){
                                $team_array[] = $data9;

                                $sql10 = "SELECT * FROM user WHERE user_id!= '$data9[sponsor_id]' sponsor_id='$data9[user_id]' and status!='0'";
                                $query10 = mysqli_query($conn,$sql10) or die(mysqli_error($conn));
                                if(mysqli_affected_rows($conn)>0){
                                 while($data10 = mysqli_fetch_assoc($query10)){
                                  $team_array[] = $data10;

                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
 $data=count($team_array);
    ?>