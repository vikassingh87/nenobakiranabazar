<?php
require_once('connection.php');

if(isset($_POST['type']) && $_POST['type'] == 'add_product'){
	extract($_POST);
	$success = false;
	$message = "";
	$product_info = get_product_by_name($product_name);
	if(!empty($product_info)){
		if($id == $product_info['id'] && $product_name == $product_info['product_name']) {
		}
		else{
			echo json_encode(array(
				"success" => false,
				"message" => "Product already exist"
			));
			die;
		}
	}

	$product_image_sql = '';
	$product_image = 'NULL';
	$product_manufacturing_date	= !empty($product_manufacturing_date)?"'".date('Y-m-d',strtotime($product_manufacturing_date))."'":'NULL';
	$product_expiry_date = !empty($product_expiry_date)?"'".date('Y-m-d',strtotime($product_expiry_date))."'":'NULL';
	if(isset($_FILES['product_image']['name']) && $_FILES['product_image']['error'] == 0){
		$product_info = get_product_by_id($id);
		if(!empty($product_info['product_image'])){
			$path = 'uploads/products/'.$product_info['product_image'];
			// echo $path;
			if(file_exists($path)){
				unlink($path);
			}
		}
		$file_name = $_FILES['product_image']['name'];
		$product_image_tmp = time().$file_name;
		$product_image = "'$product_image_tmp'";
		move_uploaded_file($_FILES['product_image']['tmp_name'], 'uploads/products/'.$product_image_tmp);
		$product_image_sql = ",`product_image`='$product_image_tmp'";
	}
	if(!empty($id)){

		$sql = "UPDATE `product_details` SET `product_name` = '$product_name',`product_price` = '$product_price', `product_nkb_price` = '$product_nkb_price',`product_quantity` = '$product_quantity',`product_manufacturing_date` = $product_manufacturing_date,`product_expiry_date`=$product_expiry_date,`product_in_stock`='$product_in_stock',`product_gst` = '$product_gst',`product_publish`='$product_publish' $product_image_sql WHERE id = '$id'";
		$message = "Product  updated successfully";
	}
	else{
		$product_code = 'NKB'.get_last_product_code();
		if($generate_barcode==0){ 
			$barcode='';
		}

		$sql = "INSERT INTO `product_details` (`product_code`,`product_name`, `product_price`, `product_nkb_price`, `product_image`, `product_quantity`, `product_manufacturing_date`, `product_expiry_date`, `product_in_stock`, `product_publish`,`product_type`,`barcode`,`barcode_generate`,`product_gst`) VALUES ('$product_code','$product_name', '$product_price', '$product_nkb_price', $product_image, '$product_quantity', $product_manufacturing_date, $product_expiry_date, '$product_in_stock', '$product_publish','$product_type','$barcode','$generate_barcode','$product_gst')";
		$message = "Product added successfully";
	}
	$query= mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if($query){
		$success = true;
	}
	else{
		$message = "Problem occure while saving in database";
	}
	echo json_encode(array(
		"success" => $success,
		"message" => $message
	));
}


if(isset($_POST['type']) && $_POST['type'] == 'delete_product'){
	$success = false;
	$message = "";
	$id = $_POST['id'];
	$product_info = get_product_by_id($id);
	if(!empty($product_info['product_image'])){
		$path = 'uploads/products/'.$product_info['product_image'];
		// echo $path;
		if(file_exists($path)){
			unlink($path);
		}
	}
	$sql = "DELETE FROM product_details WHERE id = '$id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if($query){
		$success = true;
		$message = "Product deleted successfully";
	}
	else{
		$message = "Problem occure while saving in database";
	}
	echo json_encode(array(
		"success" => $success,
		"message" => $message
	));
}


if(isset($_POST['type']) && $_POST['type'] == 'add_product_for_sale'){
	// print_r($_POST);
	$success = false;
	$message = "";
	$show_error_on_front = false;
	$product_info = array();
	if(!empty($_POST['bar_code'])){
		$bar_code = $_POST['bar_code'];
		try{
			$product_quantity = $_POST['product_quantity']+1;
			$sql = "SELECT * FROM product_details WHERE barcode = '$bar_code'";
			$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if(mysqli_num_rows($query) > 0){
				$res = mysqli_fetch_assoc($query);
				if($res['product_quantity'] < $product_quantity){
					$message = "You cannot add more quantity due to, there is only $res[product_quantity] quantity available in stock.";
					$message = "Out of stock";
					$show_error_on_front = true;
				}
				else{
					$success = true;
					$message = "Product added";
					$product_info = $res;
					$product_info['product_discount'] = 10;
					$product_info['quantity'] = 1;
				}
			}
			else{
				$message = "Invalid Bar Code";
			}
		}
		catch(Exception $e){
			$message = $e->getMessage();
		}
	}
	echo json_encode(array(
		"success" => $success,
		"message" => $message,
		"show_error_on_front" => $show_error_on_front,
		"product_info" => $product_info
	));
}


if(isset($_POST['type']) && $_POST['type'] == 'sale_product'){
	extract($_POST);
	$validation_run = false;
	$success = false;
	$message = "";
	$url = "";
	// Start Validation code here
	if(empty($customer_name)){
		$message = "Enter customer name";
	}
	else if(empty($customer_mobile_number)){
		$message = "Enter customer mobile number";
	}
	else{
		$validation_run = true;
	}
	// End Validation code here

	if($validation_run == false){
		echo json_encode(array(
			"success" => $success,
			"message" => $message
		));
		die;
	}
	else{
		$cart_data_array = array();
		if(!empty($cart_data)){
			$cart_data_array = json_decode($cart_data,true);
		}
		// check if product has not out of stock

		foreach ($cart_data_array as $key => $value) {
			$sql0001 = "SELECT * FROM product_details WHERE id = '$value[id]'";
			$query0001 = mysqli_query($conn,$sql0001) or die(mysqli_error($conn));
			if(mysqli_num_rows($query0001) > 0){
				$res0001 = mysqli_fetch_assoc($query0001);
				if($res0001['product_quantity'] < $value['product_quantity']){
					$message = "You cannot add more quantity due to, there is only $res0001[product_quantity] quantity available in stock for product ".' "'."$res0001[product_name]".'"';
					echo json_encode(array(
						"success" => false,
						"message" => $message,
					));
					die;
				}
			}
			else{
				echo json_encode(array(
					"success" => false,
					"message" => "Invalid product added in cart",
				));
				die;
			}
		}

		$total_amount_without_nkb_discount = $grand_total;
		$total_amount_to_calculate_repurchase_payout = $total_amount;
		if($is_mlm_user == 1){
			$user_id_tmp = $user_id;
			$user_id = !empty($user_id)?"'$user_id'":'NULL';
			$users_total_wallet_balance_used = !empty($users_total_wallet_balance_used)?$users_total_wallet_balance_used:0;
			$sql = "SELECT e_wallet FROM user WHERE user_id = '$user_id_tmp'";
			$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if(mysqli_num_rows($query) > 0){
				$row = mysqli_fetch_assoc($query);
				$repurchase_wallet_balance = $row['e_wallet'];
				$real_e_wallet_balance = $row['e_wallet'];
				if($users_total_wallet_balance_used > $repurchase_wallet_balance){
					echo json_encode(array(
						"success" => false,
						"message" => "Entered wallet amount is greater than user's wallet amount..",
						"repurchase_wallet_balance" => $users_total_wallet_balance_used,
					));
					die;
				}

				if($users_total_wallet_balance_used > $total_amount){
					echo json_encode(array(
						"success" => false,
						"message" => "You cannot use you wallet balance greater that total amount..",
						"repurchase_wallet_balance" => $users_total_wallet_balance_used,
					));
					die;
				}


				if($users_total_wallet_balance_used > $total_amount){
					$repurchase_wallet_balance_to_update = $real_e_wallet_balance - $total_amount;
					$total_amount_to_be_paid = 0;
				}
				else{
					$repurchase_wallet_balance_to_update = $real_e_wallet_balance - $users_total_wallet_balance_used;
					$total_amount_to_be_paid = $total_amount - $users_total_wallet_balance_used;
				}

				/*echo "repurchase_wallet_balance_to_update : ".$repurchase_wallet_balance_to_update;
				echo "<br>users_total_wallet_balance_used : ".$users_total_wallet_balance_used;
				echo "<br>total_amount_to_be_paid : ".$total_amount_to_be_paid;die;*/
				$sql002 = "UPDATE user SET e_wallet = '$repurchase_wallet_balance_to_update' WHERE user_id = '$user_id_tmp'";
				$query002 = mysqli_query($conn,$sql002) or die(mysqli_error($conn));
			}
		}
		else{
			$user_id = 'NULL';
			$users_total_wallet_balance_used = 0;
		}
		try{
			$sql = "INSERT INTO `order_purchase` (`customer_name`, `customer_mobile_number`, `total_amount_without_nkb_discount`, `total_amount`, `user_id`, `is_mlm_user`, `users_total_wallet_balance_used`, `total_amount_to_be_paid`) VALUES ('$customer_name', '$customer_mobile_number', '$total_amount_without_nkb_discount', '$total_amount', $user_id, '$is_mlm_user', '$users_total_wallet_balance_used', '$total_amount_to_be_paid')";
			$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if($query){
				$order_purchase_id = mysqli_insert_id($conn);
				if(!empty($cart_data_array)){
					foreach ($cart_data_array as $key => $value) {	
						$sql2 = "INSERT INTO `purchase_details` (`order_purchase_id`, `bar_code`, `product_name`, `product_price`, `product_nkb_price`, `quantity`, `discount`, `sub_total`) VALUES ('$order_purchase_id', '$value[barcode]', '$value[product_name]', '$value[product_price]', '$value[product_nkb_price]', '$value[quantity]', '$value[product_discount]', '$value[gross_total]')";
						$query2 = mysqli_query($conn,$sql2);	

						$sql02 = "UPDATE product_details SET product_quantity = product_quantity-'$value[quantity]' WHERE id = '$value[id]'";
						$query02 = mysqli_query($conn,$sql02) or die(mysqli_error($conn));
					}
				}
				$success = true;
				$message = "Transaction done successfully ";
				$url = "invoice.php?trans_id=".rtrim(base64_encode($order_purchase_id),'==');
				if(!empty($user_id_tmp)){
					if($total_amount_to_calculate_repurchase_payout > 30){
						$bussiness_value_percentage = 30;
						$total_bussiness_value_to_calculate_repurchase_payout_business_value = $total_amount_to_calculate_repurchase_payout/$bussiness_value_percentage;
						calculate_repurchase_for_wallet($user_id_tmp,$total_amount_to_calculate_repurchase_payout,$total_bussiness_value_to_calculate_repurchase_payout_business_value);
					}
				}
			}
			else{
				$message = "Error while adding data";
			}
		}
		catch(Exception $e){
			$message =  $e->getMessage();
		}
	}
	echo json_encode(array(
		"success" => $success,
		"message" => $message,
		"url"	 => $url,
	));

}


if(isset($_POST['type']) && $_POST['type'] == 'get_user_repurchase_wallet'){
	$success = false;
	$message = "";
	$repurchase_wallet_balance = 0;
	if(!isset($_POST['user_id']) || empty($_POST['user_id'])){
		echo json_encode(array(
			"success" => $success,
			"message" => "User id is required",
			"repurchase_wallet_balance" => $repurchase_wallet_balance
		));
		die;	
	}
	$user_id = $_POST['user_id'];
	$total_amount = $_POST['total_amount'];
	$sql = "SELECT e_wallet FROM user WHERE user_id = '$user_id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0){
		$success = true;
		$message = "Repurchase Wallet balance added into user's cart.. ";
		$row = mysqli_fetch_assoc($query);
		// echo $row['e_wallet'];
		if($row['e_wallet'] >= 100){
			$e_wallet = $row['e_wallet'];
			if($e_wallet > $total_amount){
				$e_wallet = $total_amount;
			}
			$repurchase_wallet_balance = $e_wallet;
		}
	}
	else{
		$message = "Invalid user id..";
	}
	echo json_encode(array(
		"success" => $success,
		"message" => $message,
		"repurchase_wallet_balance" => number_format($repurchase_wallet_balance,2)
	));
}


