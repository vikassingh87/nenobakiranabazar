$('#add_product').submit(function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$.ajax({
		url:'../repurchase_function.php',
		type : 'POST',
		data : formData,
		processData : false,
		async : false,
		contentType : false,
		cache : false,
		success : function(result){
			var res = JSON.parse(result);
			if(res.success == true){
				//alert(res.message);
				toastr.success('Product Added Successfully!', 'Congratulations..!');
				setTimeout(function(){
					location.href="product_list.php";
				},2000);

			}else{
				alert(res.message);
			}
		}
	})
})




$('.deleteProduct').click(function(){
	var id = $(this).attr('data-id');
	if(!confirm('Are you sure, want to delete this product ?')){
		return false;
	}
	$.ajax({
		url:'../repurchase_function.php',
		type : 'POST',
		data : {
			type : 'delete_product',
			id : id
		},
		success : function(result){
			var res = JSON.parse(result);
			if(res.success == true){
				alert(res.message);
				setTimeout(function(){
					location.reload();
				},2000);
			}else{
				alert(res.message);
			}
		}
	})
})

/*** Sale tab related functions *****/


var cart_data = [];
var amount_to_paid;
var repurchase_wallet_balance = 0;
var actual_grand_total = 0;
var user_id_valid = false;
$('#addProductByBarCode').keypress(function(e){
    if(e.which==13){
	var product_quantity = 0;
	var bar_code = $(this).val();
	for(var i = 0;i < cart_data.length;i++){
		if(cart_data[i].barcode == bar_code){
			product_quantity = cart_data[i].quantity;
		}
	}
	console.log('%c Bar Code : '+bar_code+' ','background:green;color:white;');
	$.ajax({
		url : '../repurchase_function.php',
		type : 'POST',
		data : {
			bar_code : bar_code,
			product_quantity : product_quantity,
			type : 'add_product_for_sale'
		},
		beforeSend : function(){
			$('html, body').css("cursor", "wait");
		},
		error : function(xhr){
			console.log('%c Error : '+xhr.txt+' ','background:red;color:white;');
		},
		success : function(result){
			var res = JSON.parse(result);
			$('html, body').css("cursor", "default");
			$('#addProductByBarCode').val('');
			if(res.success === true){
				console.log('%c Ajax Success, server'+"'"+'s message : '+res.message+' ','background:green;color:white;');
				add_product_to_cart(res.product_info);
			}
			else{
				if(res.show_error_on_front !== undefined){
					alert(res.message);
				}
				console.log('%c Ajax Success,server'+"'"+'s message : '+res.message+' ','background:red;color:white;');
			}
		}
	})
    }
})


function add_product_to_cart(product_info){
	var product_exist_in_cart_data = false;
	for(var i = 0;i < cart_data.length; i++){
		if(cart_data[i].id == product_info.id){
			product_exist_in_cart_data = true;
			cart_data[i].quantity = parseInt(cart_data[i].quantity)+1;
			console.log(cart_data[i].gross_total+"+"+parseFloat(product_info.product_nkb_price));
			cart_data[i].gross_total = cart_data[i].gross_total+parseFloat(product_info.product_nkb_price);
			cart_data[i].gross_total_without_discount = cart_data[i].gross_total_without_discount+parseFloat(product_info.product_price);
		}
	}
	if(product_exist_in_cart_data == false){
		product_info.gross_total = parseFloat(product_info.product_nkb_price);
		product_info.gross_total_without_discount = parseFloat(product_info.product_price);
		cart_data.push(product_info);
	}
	create_cart_table();
}

function remove_from_cart(id){
	if(confirm('Are you sure, you want to remove this item ?')){
		for(var i = 0;i< cart_data.length;i++){
			if(cart_data[i].id == id){
				cart_data.splice(i,1);
			}
		}
		create_cart_table();
	}
}

function create_cart_table(){
	var cart_table_body = grand_total_table_tbody = "";
	var grand_total_with_discount = grand_total_without_discount = 0;
	for(var i = 0;i< cart_data.length;i++){
		grand_total_with_discount += cart_data[i].gross_total;
		grand_total_without_discount += cart_data[i].gross_total_without_discount;
		cart_table_body += `<tr>
								<td>${cart_data[i].barcode}</td>
								<td>${cart_data[i].product_name}</td>
								<td>${cart_data[i].product_price}</td>
								<td>${cart_data[i].product_nkb_price}</td>
								<td>${cart_data[i].product_discount}</td>
								<td>${cart_data[i].quantity}</td>
								<td>${cart_data[i].gross_total.toFixed(2)}</td>
								<td><a href="javascript:void(0);" class="btn btn-xs btn-danger" onclick="remove_from_cart(${cart_data[i].id})"><i class="fa fa-trash"></i></a></td>
							</tr>`;
	}
	grand_total_with_discount = grand_total_with_discount.toFixed(2);
	grand_total_without_discount = grand_total_without_discount.toFixed(2);
	actual_grand_total = parseFloat(grand_total_with_discount);
	$('#cart_table tbody').html(cart_table_body);
	$('#grand_total').val(grand_total_without_discount);
	$('#total_amount').val(grand_total_with_discount);
	calculate_amount_to_be_paid();

}

function calculate_amount_to_be_paid(){
	// need to be write  code for it.
	var total_amount_to_be_paid = actual_grand_total;
	if(actual_grand_total > 0){
		console.log("repurchase_wallet_balance:"+repurchase_wallet_balance);
		console.log("actual_grand_total:"+actual_grand_total);
		if(actual_grand_total >= repurchase_wallet_balance){
			total_amount_to_be_paid = actual_grand_total-repurchase_wallet_balance;
		}
		else{
			// total_amount_to_be_paid = repurchase_wallet_balance - actual_grand_total;
			total_amount_to_be_paid = 0;
		}
	}
	console.log("total_amount_to_be_paid : "+total_amount_to_be_paid);
	$('#total_amount_to_be_paid').val(parseFloat(total_amount_to_be_paid).toFixed(2));
}

$('#sale_product').submit(function(e){
	e.preventDefault();
	var formData = new FormData(this);
	formData.append('cart_data',JSON.stringify(cart_data));
	$.ajax({
		url:'../repurchase_function.php',
		type : 'POST',
		data : formData,
		processData : false,
		async : false,
		contentType : false,
		cache : false,
		success : function(result){
			console.log(result);
			var res = JSON.parse(result);
			if(res.success == true){
				alert(res.message);
				setTimeout(function(){
					location.href = res.url;
				},2000);
			}
			else{
				alert(res.message);
			}
		}
	})
})

$('[name="is_mlm_user"]').click(function(){
  if($(this).val() == 1){
     $('#mlm_user_details').show();
     $('#user_id').attr('required','required');
  }
  else{
     $('#mlm_user_details').hide();
     $('#user_id').removeAttr('required');
     $('#user_id,#users_total_wallet_balance_used').val('');
     repurchase_wallet_balance = 0;
     calculate_amount_to_be_paid();
  }
})

$('#user_id').blur(function(){
  var user_id = $(this).val();
  if(user_id == ''){
    $('#users_total_wallet_balance_used').val('0.00').attr('readonly','readonly');
    $('#users_wallet_check_message').hide();
    repurchase_wallet_balance = 0;
    calculate_amount_to_be_paid();
    return false;
  }
  $.ajax({
     url : '../repurchase_function.php',
     type : 'POST',
     data : {
        user_id : user_id,
        total_amount : actual_grand_total,
        type : 'get_user_repurchase_wallet'
     },
     beforeSend : function(){
        // initialize page loader here
     },
     error : function(xhr){
        console.log(xhr.status);
     },
     success : function(result){
        console.log(result);
        var res = JSON.parse(result);
        if(res.success == true){
           	$('#users_wallet_check_message').removeClass('error').addClass('success').html(res.message).show();
        	repurchase_wallet_balance = parseFloat(res.repurchase_wallet_balance);
           	$('#users_total_wallet_balance_used').val(repurchase_wallet_balance.toFixed(2));
           	user_id_valid = true;
           	calculate_amount_to_be_paid();
        }
        else{
           $('#users_wallet_check_message').removeClass('success').addClass('error').html(res.message).show();
           // $('#users_total_wallet_balance_used').val(repurchase_wallet_balance.toFixed(2));
           repurchase_wallet_balance = 0;
           if(res.repurchase_wallet_balance !== undefined){
           	repurchase_wallet_balance = parseFloat(res.repurchase_wallet_balance);
           }
           calculate_amount_to_be_paid();
        }
     }
  })
})


$('#change_wallet_balance').click(function(){
	if($('#user_id').val() != '' && user_id_valid == true){
		$('#users_total_wallet_balance_used').removeAttr('readonly');
	}
})

$('#users_total_wallet_balance_used').focus(function(){
	$(this).select();
})

$('#users_total_wallet_balance_used').keyup(function(){
	repurchase_wallet_balance = parseFloat($(this).val());
	calculate_amount_to_be_paid();
})


