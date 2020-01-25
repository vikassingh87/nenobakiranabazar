<?php
 //session_start();
$userid = $_SESSION["userid"];
include('../connection.php');
$find_user_id=mysqli_query($conn,"SELECT * FROM user where id!='1'")or die(mysqli_error($conn));

while ($fetch_data=mysqli_fetch_assoc($find_user_id)) {
	$userid=$fetch_data['user_id'];
    Generate_working_income($userid);
}
function Generate_working_income($userid)
{       global$conn;
		$dt = new DateTime();
	$ct = $dt->format('Y-m-d');
	$new_sql = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$userid' and user_id!='$userid' AND status='1' ") or die(mysqli_error($conn));
	while ($rec = mysqli_fetch_assoc($new_sql)) {
	    $new_record = $rec['user_id'];
	    $new_user_name    = $rec['user_name'];
	    $new_sponsor_name = $rec['sponsor_name'];
	    $package          = $rec['package'];
	    $value_income     = $package * 0.35 / 100;
	    $date             = $rec['active_date'];
	    $find_date        = date('Y-m-d', strtotime($date));
	    
	    $search_data = mysqli_query($conn, "SELECT * FROM working_new_income where user_id='$new_record' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
	    if (mysqli_affected_rows($conn)) {
	        
	    }
	    else 
	    {
	       $income_insert = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record','$new_user_name','$userid','$new_sponsor_name','$value_income','$ct','1')") or die(mysqli_error($conn));
	     }
	    
	    
	    $new_sql1 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record'AND status='1'") or die(mysqli_error($conn));
	    while ($rec1 = mysqli_fetch_assoc($new_sql1)) {
	        $new_record1       = $rec1['user_id'];
	        $new_user_name1    = $rec1['user_name'];
	        $new_sponsor_name1 = $rec1['sponsor_name'];
	        $package1          = $rec1['package'];
	        $value_income1     = $package1* 0.20/100;
	        $date1             = $rec1['active_date'];
	        $find_date1        = date('Y-m-d', strtotime($date1));
	        // $last_id = $conn->insert_id;

	        $search_data1 = mysqli_query($conn, "SELECT * FROM working_new_income where user_id='$new_record1' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
	        if (mysqli_affected_rows($conn)) {
	        } else {
	            $income_insert1 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record1','$new_user_name1','$userid','$new_sponsor_name1','$value_income1','$ct','2')") or die(mysqli_error($conn));
	        }
	        
	        $new_sql2 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record1'AND status='1'") or die(mysqli_error($conn));
	        $new_sql23 = mysqli_query($conn, "SELECT SUM(package) as sum FROM user where sponsor_id='$new_record1'") or die(mysqli_error($conn));
	        $rec23    = mysqli_fetch_assoc($new_sql23);
	        $package2 = $rec23['sum'];
	        while ($rec2 = mysqli_fetch_assoc($new_sql2)) {
	            $new_record2       = $rec2['user_id'];
	            $new_user_name2    = $rec2['user_name'];
	            $new_sponsor_name2 = $rec2['sponsor_name'];
	            $package12         = $rec2['package'];
	            $search_data2 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record2' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
	            if (mysqli_affected_rows($conn)) {
	                
	            } else {
	                if ($package2 >= '3000') {
	                    
	                    $value_income2 = $package12 * 0.20 / 100;
	                    
	                    $date2      = $rec2['active_date'];
	                    $find_date2 = date('Y-m-d', strtotime($date2));
	                    $income_insert2 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record2','$new_user_name2','$userid','$new_sponsor_name2','$value_income2','$ct','3')") or die(mysqli_error($conn));
	                }
	            }
	            $new_sql3 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record2'AND status='1'") or die(mysqli_error($conn));
	            $new_sql33 = mysqli_query($conn, "SELECT SUM(package) as sum  FROM user where sponsor_id='$new_record2'") or die(mysqli_error($conn));
	            $rec33     = mysqli_fetch_assoc($new_sql33);
	            $package23 = $rec33['sum'];
	            while ($rec3 = mysqli_fetch_assoc($new_sql3)) 
	            {
	                $new_record3       = $rec3['user_id'];
	                $new_user_name3    = $rec3['user_name'];
	                $new_sponsor_name3 = $rec3['sponsor_name'];
	                $package22         = $rec3['package'];
	                $search_data3 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record3' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
	                if (mysqli_affected_rows($conn)) {
	                    
	                } 
	                else 
	                {
	                    if ($package23 >= '40000') 
	                    {
	                        
	                        $value_income3 = $package22 * 0.20 / 100;
	                        
	                        $date3      = $rec3['active_date'];
	                        $find_date3 = date('Y-m-d', strtotime($date3));
	                        $income_insert3 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record3','$new_user_name3','$userid','$new_sponsor_name3','$value_income3','$ct','4')") or die(mysqli_error($conn));
	                    }
	                }
		                $new_sql4 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record3'AND status='1'") or die(mysqli_error($conn));
		            $new_sql34 = mysqli_query($conn, "SELECT SUM(package) as sum  FROM user where sponsor_id='$new_record3'") or die(mysqli_error($conn));
		            $rec34     = mysqli_fetch_assoc($new_sql34);
		            $package24 = $rec34['sum'];
		            while ($rec4 = mysqli_fetch_assoc($new_sql4))
		            {
		                $new_record4       = $rec4['user_id'];
		                $new_user_name4    = $rec4['user_name'];
		                $new_sponsor_name4 = $rec4['sponsor_name'];
		                $package23         = $rec4['package'];
		                $search_data4 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record4' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
		                if (mysqli_affected_rows($conn)) {
		                    
		                } 
		                else 
		                {
		                    if ($package24 >= '5000') 
		                    {
		                        
		                        $value_income4 = $package23 * 0.15 / 100;
		                        
		                        $date4      = $rec4['active_date'];
		                        $find_date4 = date('Y-m-d', strtotime($date4));
		                        $income_insert4 = mysqli_query($conn, "INSERT INTO working_new_income(user
		                        	_id,user_name,sponsor_id,sponsor_name,income,activat
		                        ion_date,level)values('$new_record4','$new_user_name4','$userid','$new_sponsor_name4','$value_income4','$ct','5')") or die(mysqli_error($conn));
		                    }
		                }
			                    $new_sql5 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record4'AND status='1'") or die(mysqli_error($conn));
			            $new_sql35 = mysqli_query($conn, "SELECT SUM(package) as sum  FROM user where sponsor_id='$new_record4'") or die(mysqli_error($conn));
			            $rec35     = mysqli_fetch_assoc($new_sql34);
			            $package25 = $rec35['sum'];
			            while ($rec5 = mysqli_fetch_assoc($new_sql5))
			            {
			                $new_record5       = $rec5['user_id'];
			                $new_user_name5    = $rec5['user_name'];
			                $new_sponsor_name5 = $rec5['sponsor_name'];
			                $package24         = $rec5['package'];
			                $search_data5 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record5' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
			                if (mysqli_affected_rows($conn)) {
			                    
			                } 
			                else 
			                {
			                    if ($package25 >= '5000') 
			                    {
			                        
			                        $value_income5 = $package24 * 0.15 / 100;
			                        
			                        $date5      = $rec5['active_date'];
			                        $find_date5 = date('Y-m-d', strtotime($date5));
			                        $income_insert5 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record5','$new_user_name5','$userid','$new_sponsor_name5','$value_income5','$ct','6')") or die(mysqli_error($conn));
			                    }
			                }
				                     $new_sql6 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record5'AND status='1'") or die(mysqli_error($conn));
				            $new_sql36 = mysqli_query($conn, "SELECT SUM(package) as sum  FROM user where sponsor_id='$new_record5'") or die(mysqli_error($conn));
				            $rec36     = mysqli_fetch_assoc($new_sql35);
				            $package26 = $rec36['sum'];
				            while ($rec6 = mysqli_fetch_assoc($new_sql6))
				            {
				                $new_record6       = $rec6['user_id'];
				                $new_user_name6    = $rec6['user_name'];
				                $new_sponsor_name6 = $rec6['sponsor_name'];
				                $package25         = $rec6['package'];
				                $search_data6 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record5' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
				                if (mysqli_affected_rows($conn)) {
				                    
				                } 
				                else 
				                {
				                    if ($package26 >= '5000') 
				                    {
				                        
				                        $value_income6 = $package25 * 0.15 / 100;
				                        
				                        $date6      = $rec6['active_date'];
				                        $find_date6 = date('Y-m-d', strtotime($date6));
				                        $income_insert6 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record6','$new_user_name6','$userid','$new_sponsor_name6','$value_income6','$ct','7')") or die(mysqli_error($conn));
				                    }
				                }
					                    $new_sql7 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record6'AND status='1'") or die(mysqli_error($conn));
					            $new_sql37 = mysqli_query($conn, "SELECT SUM(package) as sum  FROM user where sponsor_id='$new_record6'") or die(mysqli_error($conn));
					            $rec37     = mysqli_fetch_assoc($new_sql36);
					            $package27 = $rec37['sum'];
					            while ($rec7 = mysqli_fetch_assoc($new_sql7))
					            {
					                $new_record7       = $rec7['user_id'];
					                $new_user_name7    = $rec7['user_name'];
					                $new_sponsor_name7 = $rec7['sponsor_name'];
					                $package26         = $rec7['package'];
					                $search_data7 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record6' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
					                if (mysqli_affected_rows($conn)) {
					                    
					                } 
					                else 
					                {
					                    if ($package27 >= '5000') 
					                    {
					                        
					                        $value_income7 = $package26 * 0.15 / 100;
					                        
					                        $date7      = $rec7['active_date'];
					                        $find_date7 = date('Y-m-d', strtotime($date7));
					                        $income_insert7 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record7','$new_user_name7','$userid','$new_sponsor_name7','$value_income7','$ct','8')") or die(mysqli_error($conn));
					                    }
					                }
						                     $new_sql8 = mysqli_query($conn, "SELECT * FROM user where sponsor_id='$new_record7'AND status='1'") or die(mysqli_error($conn));
						            $new_sql38 = mysqli_query($conn, "SELECT SUM(package) as sum  FROM user where sponsor_id='$new_record7'") or die(mysqli_error($conn));
						            $rec38     = mysqli_fetch_assoc($new_sql37);
						            $package28 = $rec38['sum'];
						            while ($rec8 = mysqli_fetch_assoc($new_sql8))
						            {
						                $new_record8       = $rec8['user_id'];
						                $new_user_name8    = $rec8['user_name'];
						                $new_sponsor_name8 = $rec8['sponsor_name'];
						                $package27         = $rec8['package'];
						                $search_data8 = mysqli_query($conn, "SELECT * FROM  working_new_income where user_id='$new_record7' AND activation_date='$ct' and sponsor_id='$userid'") or die(mysqli_error($conn));
						                if (mysqli_affected_rows($conn)) {
						                    
						                } 
						                else 
						                {
						                    if ($package28 >= '5000') 
						                    {
						                        
						                        $value_income8 = $package27 * 0.10 / 100;
						                        
						                        $date8      = $rec8['active_date'];
						                        $find_date8 = date('Y-m-d', strtotime($date8));
						                        $income_insert8 = mysqli_query($conn, "INSERT INTO working_new_income(user_id,user_name,sponsor_id,sponsor_name,income,activation_date,level)values('$new_record8','$new_user_name8','$userid','$new_sponsor_name8','$value_income8','$ct','9')") or die(mysqli_error($conn));
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
?>
