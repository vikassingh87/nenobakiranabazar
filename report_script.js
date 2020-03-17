$(document).ready(function(){
	get_sale_report();
	get_stock_report();
	get_expired_report();
})

var sales_report_table =  $('#sales_report').DataTable();
var stock_report_table =  $('#stock_report').DataTable();
var expired_report_table =  $('#expired_report').DataTable();


function get_sale_report(){
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
	$.ajax({
		url : '../report_funciton.php',
		type : 'post',
		beforeSend : function(){ sales_report_table.clear().draw();},
		data : {
			from_date : from_date,
			to_date : to_date,
			type : 'get_sale_report',
		},
		success : function(result){
			var res = JSON.parse(result);
			// console.log(res);
			for(var i = 0; i< res.result.length; i++){
				var row_value = res.result[i];
				//console.log(row_value.user_id);
				sales_report_table.row.add([
					i+1,
					row_value.user_id,
					row_value.customer_name,
					row_value.customer_mobile_number,
					row_value.wallet_balance_used,
					row_value.total_amount_paid,
					row_value.total_amount,
					row_value.date,
					row_value.action
				]).draw();
			}
		}
	})
}


function get_purchase_details(order_purchase_id){
	$.ajax({
		url : '../modal.php',
		type : 'post',
		data : {
			order_purchase_id : order_purchase_id,
			type : 'get_purchase_details_modal',
		},
		success : function(result){
			var res = JSON.parse(result);
			$('#get_purchase_details_modal').html(res.html);
			$('#get_purchase_details_modal').modal('show');
		}
	})
}


function get_stock_report(){
	$.ajax({
		url : '../report_funciton.php',
		type : 'POST',
		beforeSend : function(){ stock_report_table.clear().draw();},
		data : {
			type : 'get_stock_report',
		},
		success : function(result){
			var res = JSON.parse(result);

			//console.log(result);
			for(var i = 0; i< res.result.length; i++){
				var row_value = res.result[i];
				
				stock_report_table.row.add([
					i+1,
					row_value.product_code,
					row_value.barcode_img,
					row_value.product_name,
					row_value.pro_img,
					row_value.product_price,
					row_value.product_nkb_price,
					row_value.product_manufacturing_date,
					row_value.product_expiry_date,
					row_value.product_quantity,
				]).draw();
			}
		}
	})
}
function get_expired_report(){
	$.ajax({
		url : '../report_funciton.php',
		type : 'POST',
		beforeSend : function(){ expired_report_table.clear().draw();},
		data : {
			type : 'get_expired_report',
		},
		success : function(result){
			var res = JSON.parse(result);

			//console.log(result);
			for(var i = 0; i< res.result.length; i++){
				var row_value = res.result[i];
				
				expired_report_table.row.add([
					i+1,
					row_value.product_code,
					row_value.barcode_img,
					row_value.product_name,
					row_value.pro_img,
					row_value.product_price,
					row_value.product_nkb_price,
					row_value.product_manufacturing_date,
					row_value.product_expiry_date,
					row_value.product_quantity,
				]).draw();
			}
		}
	})
}
