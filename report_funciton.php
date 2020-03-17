<?php
require_once 'connection.php';

if(isset($_POST['type']) && $_POST['type'] == 'get_sale_report'){
	$result = array();
	$sql = "SELECT id,
					user_id,
					customer_name,
					customer_mobile_number,
					users_total_wallet_balance_used as wallet_balance_used,
					total_amount_to_be_paid as total_amount_paid,
					total_amount,
					created_date as date 
					FROM order_purchase";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row = mysqli_fetch_assoc($query)){
		if(empty($row['user_id'])){
		    $row['user_id'] = 'Non NKB User';
		}
		$action = '<a href="javascript:void(0);" class="btn btn-info btn-xs" onclick="get_purchase_details('.$row['id'].')">View Details</a>';
		$row['action'] = $action;
		$result[] = $row;
	}
	echo json_encode(array(
		"result" => $result,
	));
}

if(isset($_POST['type']) && $_POST['type'] == 'get_stock_report'){
	$result = array();
	$current_date=date('Y-m-d');
    $sql = "SELECT * FROM product_details where product_expiry_date>='$current_date'";
    $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
         
    while($row = mysqli_fetch_assoc($query)){		
	$barcode_img = '<img class="barcode" alt="'. $row['barcode'].'" src="barcode.php?text='. $row['barcode'].'&codetype=code128&orientation=horizontal&size=20&print=true"/>';
	$product_img = '<a href="../uploads/products/'.$row['product_image'].'" target="_blank"><img src="../uploads/products/'.$row['product_image'].'" height="50" width="50"></a>';
	$row['barcode_img'] = $barcode_img;
	$row['pro_img'] = $product_img;
	$result[] = $row;
	}
	
	echo json_encode(array(
		"result" => $result,
	));
}

if(isset($_POST['type']) && $_POST['type'] == 'get_expired_report'){
	$result = array();
	$current_date=date('Y-m-d');
    $sql = "SELECT * FROM product_details where product_expiry_date<='$current_date'";
    $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
         
    while($row = mysqli_fetch_assoc($query)){		
	$barcode_img = '<img class="barcode" alt="'. $row['barcode'].'" src="barcode.php?text='. $row['barcode'].'&codetype=code128&orientation=horizontal&size=20&print=true"/>';
	$product_img = '<a href="../uploads/products/'.$row['product_image'].'" target="_blank"><img src="../uploads/products/'.$row['product_image'].'" height="50" width="50"></a>';
	$row['barcode_img'] = $barcode_img;
	$row['pro_img'] = $product_img;
	$result[] = $row;
	}
	
	echo json_encode(array(
		"result" => $result,
	));
}