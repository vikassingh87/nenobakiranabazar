<?php 

function update_my_team_count($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$sql = "UPDATE user SET my_team_count = my_team_count+'1' WHERE user_id = '$user_info[sponsor_id]'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$sponsor_info = get_user_info($user_info['sponsor_id']);
	if($user_info['sponsor_id'] == 'NKB808298'){
		return true;
		die;
	}
	else{
	    update_my_team_count($sponsor_info['user_id']);
	}
}


function update_my_direct_team_count($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$sql = "UPDATE user SET my_direct_team_count = my_direct_team_count+'1' WHERE user_id = '$user_info[sponsor_id]'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	return true;
}


function calculate_level_payout($user_id,$level_count = null){
	global $conn;
	$payout_amount_level_wise = array(1=>80,2=>60,3=>40,4=>20,5=>10,6=>5,7=>5,8=>5,9=>5,10=>5);
	if($level_count == null){
		$level_count = 1;
	}
	$user_info = get_user_info($user_id);
	$sponsor_id = $user_info['sponsor_id'];
	if($sponsor_id == 'admin'){
		return true;
	}
	$payout_amount = $payout_amount_level_wise[$level_count];
	//echo "<br>sponsor_id : $sponsor_id ---> payout_amount : $payout_amount";
	$sql = "SELECT * FROM payout WHERE user_id = '$sponsor_id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0){
		$sql2 = "UPDATE payout SET level_payout_amount = level_payout_amount+'$payout_amount' WHERE user_id = '$sponsor_id'";
	}
	else{
		$sql2 = "INSERT INTO payout(`user_id`,`level_payout_amount`) VALUES('$sponsor_id','$payout_amount')";
	}
	mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	if($level_count == 10){
		return true;
	}
	
	$level_count = $level_count+1;
	calculate_level_payout($sponsor_id,$level_count);
}

function calculate_referral_bonus_payout($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$sponsor_id = $user_info['sponsor_id'];
	if($sponsor_id != 'admin'){
		$referral_payout_amount = 100;
		//echo "<br>sponsor_id : $sponsor_id -----> payout_amount : ".$referral_payout_amount;
		$sql = "SELECT * FROM payout WHERE user_id = '$sponsor_id'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($query) > 0){
			$sql2 = "UPDATE payout SET referral_payout_amount = referral_payout_amount+'$referral_payout_amount' WHERE user_id = '$sponsor_id'";
		}
		else{
			$sql2 = "INSERT INTO payout(`user_id`,`referral_payout_amount`) VALUES('$sponsor_id','$referral_payout_amount')";
		}
		mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	}
	return true;
}

function calculate_direct_referral_bonus_payout($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$sponsor_id = $user_info['sponsor_id'];
	$sponsor_info = get_user_info($sponsor_id);
	if($sponsor_id != 'admin'){
		$direct_referral_payout_amount = 100;
		if($sponsor_info['is_eligible_for_direct_referral_income_payout'] == 0){
			$sql2 = "SELECT * FROM user WHERE sponsor_id = '$sponsor_id' AND status = '1'";
			$query2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
			$total_direct_user = mysqli_num_rows($query2);
			$direct_referral_payout_amount = 0;
			if($total_direct_user >= 5){
				$direct_referral_payout_amount = 500;
				$sql02 = "UPDATE user SET is_eligible_for_direct_referral_income_payout ='1' WHERE user_id = '$sponsor_id'";
				$query02 = mysqli_query($conn,$sql02) or die(mysqli_error($conn));
			}
		}
		//echo "<br>sponsor_id : $sponsor_id ----> payout_amount :".$direct_referral_payout_amount;
		$sql = "SELECT * FROM payout WHERE user_id = '$sponsor_id'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($query) > 0){
			$sql2 = "UPDATE payout SET direct_referral_payout_amount = direct_referral_payout_amount+'$direct_referral_payout_amount' WHERE user_id = '$sponsor_id'";
		}
		else{
			$sql2 = "INSERT INTO payout(`user_id`,`direct_referral_payout_amount`) VALUES('$sponsor_id','$direct_referral_payout_amount')";
		}
		mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	}
	return true;
}

function calculate_performance_bonus_payout($user_id,$level_count = null){
	global $conn;
	$payout_amount_level_wise = array(1=>0,2=>50,3=>50,4=>50,5=>50);
	if($level_count == null){
		$level_count = 1;
	}

	$user_info = get_user_info($user_id);
	$sponsor_id = $user_info['sponsor_id'];
	if($sponsor_id == 'admin'){
		return true;
	}
	$performance_payout_amount = $payout_amount_level_wise[$level_count];
	//echo "<br>sponsor_id : $sponsor_id ----> payout_amount : ".$performance_payout_amount;
	$sql = "SELECT * FROM payout WHERE user_id = '$sponsor_id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0){
		$sql2 = "UPDATE payout SET performance_payout_amount = performance_payout_amount+'$performance_payout_amount' WHERE user_id = '$sponsor_id'";
	}
	else{
		$sql2 = "INSERT INTO payout(`user_id`,`performance_payout_amount`) VALUES('$sponsor_id','$performance_payout_amount')";
	}
	mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	

	if($level_count == 5){
		return true;
	}
	$level_count = $level_count+1;
	calculate_performance_bonus_payout($sponsor_id,$level_count);
}

function get_user_info($user_id){
	global $conn;
	$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query)>0){
		$row = mysqli_fetch_assoc($query);
		return $row;
	}
	else{
		return array();
	}
}

function get_user_info_by_id($id){
	global $conn;
	$sql = "SELECT * FROM user WHERE id = '$id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	return $row;
}

function get_payout_info($user_id){
	global $conn;
	$array = array('level_payout_amount' => '0','referral_payout_amount' => 0,'direct_referral_payout_amount' => 0,'performance_payout_amount' => 0);
	$sql = "SELECT * FROM payout WHERE user_id = '$user_id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query)){
		$array = mysqli_fetch_assoc($query);
	}
	return $array;
}


function send_phpmail1( $toname, $to ,$fromname, $from , $subject, $body )
{
    global $mailsetting;

    if(empty($from))
    {

        $fromname = $mailsetting['defaultfromname'];
        $from = $mailsetting['defaultfromemail'];
    }
    if(empty($to))
    {
        $toname = $mailsetting['defaulttoname'];
        $to = $mailsetting['defaulttoemail'];
    }
    $cc = $mailsetting['defaultccemail'];
    $header = "From: $fromname <$from> \r\n";
    if(!empty($cc))
    {
        $header .= "Cc: $cc \r\n";
    }

    $header .= 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    //send mail
    if(mail( $to, $subject, $body, $header))
    {
        return true;
    }
    else 
    {
        return false;
    }

}

function get_current_rank($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$user_current_rank = 'Sales Executive';
	$sql = "SELECT * FROM user_rank WHERE user_id = '$user_info[id]'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query)>0){
		$row = mysqli_fetch_assoc($query);
		if($row['senior_sales_executive'] == 1){
			$user_current_rank = 'Senior Sales Executive';
		}
		if($row['star_executive'] == 1){
			$user_current_rank = 'Star Executive';
		}
		if($row['senior_star_executive'] == 1){
			$user_current_rank = 'Senior Star Executive';
		}
		if($row['pearl_executive'] == 1){
			$user_current_rank = 'Pearl Executive';
		}
		if($row['silver_executive'] == 1){
			$user_current_rank = 'Silver Executive';
		}
		if($row['gold_executive'] == 1){
			$user_current_rank = 'Gold Executive';
		}
		if($row['platinum_executive'] == 1){
			$user_current_rank = 'Platinum Executive';
		}
		if($row['diamond_executive'] == 1){
			$user_current_rank = 'Diamond Executive';
		}
		if($row['kohinoor_executive'] == 1){
			$user_current_rank = 'Kohinor Executive';
		}
	}
	return $user_current_rank;
}



function get_total_direct_count($user_id){
	global $conn;
	$sql = "SELECT * FROM user WHERE sponsor_id = '$user_id' AND user_id !='$user_id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	return mysqli_num_rows($query);
}

function check_for_rank($user_id){
	global $conn;
	// echo "User id : ".$user_id;
	$user_info = get_user_info($user_id);
	$sponsor_id = $user_info['sponsor_id'];
	// echo "<br>sponsor_id : ".$sponsor_id;
	$sponsor_info = get_user_info($user_info['sponsor_id']);
	if(empty($sponsor_info) || $user_id == $sponsor_id){
		return true;
	}
	$insert_sql = "INSERT INTO user_rank SET ";
	$update_sql = "UPDATE user_rank SET ";
	$sponsor_total_direct_count = get_total_direct_count($sponsor_id);
	$column_to_update = 'sales_executive';
	$update_column_flag = false;
	/*echo "<pre>";
	print_r($sponsor_info);*/
	if($sponsor_total_direct_count == 5 && $sponsor_info['my_team_count'] < 25){
		$column_to_update = 'senior_sales_executive';
		$insert_sql .= "`senior_sales_executive`='1',";
		$update_sql .= "`senior_sales_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 25){
		$column_to_update = 'star_executive';
		$insert_sql .= "`star_executive`='1',";
		$update_sql .= "`star_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 625){
		$column_to_update = 'senior_star_executive';
		$insert_sql .= "`senior_star_executive`='1',";
		$update_sql .= "`senior_star_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 3125){
		$column_to_update = 'pearl_executive';
		$insert_sql .= "`pearl_executive`='1',";
		$update_sql .= "`pearl_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 15625){
		$column_to_update = 'silver_executive';
		$insert_sql .= "`silver_executive`='1',";
		$update_sql .= "`silver_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 78125){
		$column_to_update = 'gold_executive';
		$insert_sql .= "`gold_executive`='1',";
		$update_sql .= "`gold_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 390625){
		$column_to_update = 'platinum_executive';
		$insert_sql .= "`platinum_executive`='1',";
		$update_sql .= "`platinum_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 1953125){
		$column_to_update = 'diamond_executive';
		$insert_sql .= "`diamond_executive`='1',";
		$update_sql .= "`diamond_executive`='1',";
		$update_column_flag = true;
	}
	if($sponsor_total_direct_count >= 5 && $sponsor_info['my_team_count'] >= 9765625){
		$column_to_update = 'kohinoor_executive';
		$insert_sql .= "`kohinoor_executive`='1',";
		$update_sql .= "`kohinoor_executive`='1',";
		$update_column_flag = true;
	}

	$update_sql = rtrim($update_sql,',');
	// echo $update_sql.'<br>------------<br>';
	if($update_column_flag == true){
		$sql2 = "SELECT * FROM user_rank WHERE user_id = '$sponsor_info[id]'";
		$query2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		if(mysqli_num_rows($query2)){
			$sql3 = $update_sql." WHERE user_id = '$sponsor_info[id]'";
		}
		else{
			$sql3 = $insert_sql."user_id = '$sponsor_info[id]'";
		}
		// echo $sql3;echo "<br>";
		$quey3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
	}
	check_for_senior_sales_executive($sponsor_id);
}

function check_for_fund($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$sponsor_id = $user_info['sponsor_id'];
	// echo "<br>sponsor_id : ".$sponsor_id;
	$sponsor_info = get_user_info($user_info['sponsor_id']);
	if(empty($sponsor_info) || $user_id == $sponsor_id){
		return true;
	}
	$sql = "SELECT t2.user_id,t2.senior_sales_executive,t2.senior_star_executive,t2.star_executive,t2.senior_star_executive,t2.pearl_executive,t2.silver_executive,t2.gold_executive,t2.platinum_executive,t2.diamond_executive,t2.kohinoor_executive FROM user t1 INNER JOIN user_rank t2 ON t2.user_id = t1.id WHERE t1.sponsor_id ='$sponsor_info[user_id]'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$users_array = array();
	if(mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_assoc($query)){
			$users_array[] = $row;
		}
		// echo "<pre>";
		// print_r($users_array);
		$senior_sales_executive = $star_executive = $senior_star_executive = $pearl_executive = $silver_executive = $gold_executive = $platinum_executive = $diamond_executive =  $kohinoor_executive = 0;
		foreach ($users_array as $key => $value) {
			$senior_sales_executive += $value['senior_sales_executive'];
			$star_executive += $value['star_executive'];
			$senior_star_executive += $value['senior_star_executive'];
			$pearl_executive += $value['pearl_executive'];
			$silver_executive += $value['silver_executive'];
			$gold_executive += $value['gold_executive'];
			$platinum_executive += $value['platinum_executive'];
			$diamond_executive += $value['diamond_executive'];
			$kohinoor_executive += $value['kohinoor_executive'];
		}
		/*echo "<br>senior_sales_executive : ".$senior_sales_executive;
		echo "<br>star_executive : ".$star_executive;
		echo "<br>senior_star_executive : ".$senior_star_executive;*/

		$run_query = false;
		$insert_sql = "INSERT INTO user_fund_eligibility SET ";
		$update_sql = "UPDATE user_fund_eligibility SET ";
		if($star_executive >= 1){
			$insert_sql .= "`bike_fund`='1',";
			$update_sql .= "`bike_fund` = '1'";
			$run_query = true;
		}
		if($senior_star_executive >= 1){
			$insert_sql .= "`car_fund`='1',";
			$update_sql .= "`car_fund` = '1'";
			$run_query = true;
		}
		if($pearl_executive >= 1){
			$insert_sql .= "`laxury_car_fund`='1',";
			$update_sql .= "`laxury_car_fund` = '1'";
			$run_query = true;
		}
		if($silver_executive >= 1){
			$insert_sql .= "`house_fund`='1',";
			$update_sql .= "`house_fund` = '1'";
			$run_query = true;
		}
		if($gold_executive >= 1){
			$insert_sql .= "`banglow_fund`='1',";
			$update_sql .= "`banglow_fund` = '1'";
			$run_query = true;
		}
		if($kohinoor_executive >= 1){
			$insert_sql .= "`club_fund`='1',";
			$update_sql .= "`club_fund` = '1'";
			$run_query = true;
		}
		if($run_query == true){
			$sql2 = "SELECT * FROM user_fund_eligibility WHERE user_id = '$sponsor_info[id]'";
			$query2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
			if(mysqli_num_rows($query2)){
				$sql3 = $update_sql." WHERE user_id = '$sponsor_info[id]'";
			}
			else{
				$sql3 = $insert_sql."user_id = '$sponsor_info[id]'";
			}
			// echo $sql3;echo "<br>";
			$quey3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
		}

		// echo "<br>---------------------------<br>";
	}
	check_for_fund($sponsor_info['user_id']);
}

function get_current_fund_eligibility($user_id){
	global $conn;
	$user_info = get_user_info($user_id);
	$user_current_fund_elibility = '';
	$sql = "SELECT * FROM user_fund_eligibility WHERE user_id = '$user_info[id]'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query)>0){
		$row = mysqli_fetch_assoc($query);
		if($row['bike_fund'] == 1){
			$user_current_fund_elibility = 'Bike Fund';
		}
		if($row['car_fund'] == 1){
			$user_current_fund_elibility = 'Car Fund';
		}
		if($row['laxury_car_fund'] == 1){
			$user_current_fund_elibility = 'Laxury Car Fund';
		}
		if($row['house_fund'] == 1){
			$user_current_fund_elibility = 'House Fund';
		}
		if($row['banglow_fund'] == 1){
			$user_current_fund_elibility = 'Banglow Fund';
		}
		if($row['club_fund'] == 1){
			$user_current_fund_elibility = 'Club Fund';
		}
	}
	return $user_current_fund_elibility;

}


?>