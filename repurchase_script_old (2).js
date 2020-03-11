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

var cart_data = [];
$('#addProductByBarCode').blur(function(){
	var bar_code = $(this).val();
	console.log('%c Bar Code : '+bar_code+' ','background:green;color:white;');
	$.ajax({
		url : '../repurchase_function.php',
		type : 'POST',
		data : {
			bar_code : bar_code,
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
			if(res.success == true){
				console.log('%c Ajax Success, server'+"'"+'s message : '+res.message+' ','background:green;color:white;');
				add_product_to_cart(res.product_info);
			}
			else{
				console.log('%c Ajax Success,server'+"'"+'s message : '+res.message+' ','background:red;color:white;');
			}
		}
	})
})


function add_product_to_cart(product_info){
	var product_exist_in_cart_data = false;
	for(var i = 0;i < cart_data.length; i++){
		if(cart_data[i].id == product_info.id){
			product_exist_in_cart_data = true;
			cart_data[i].quantity = parseInt(cart_data[i].quantity)+1;
			console.log(cart_data[i].gross_total+"+"+parseFloat(product_info.product_nkb_price));
			cart_data[i].gross_total = cart_data[i].gross_total+parseFloat(product_info.product_nkb_price);
		}
	}
	if(product_exist_in_cart_data == false){
		product_info.gross_total = parseFloat(product_info.product_nkb_price);
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
	var grand_total = 0;
	for(var i = 0;i< cart_data.length;i++){
		grand_total += cart_data[i].gross_total;
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
	if(grand_total >= 0){
		var grand_total_table_tbody = `<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>${grand_total.toFixed(2)}</td>
										</tr>`;
	}
	$('#cart_table tbody').html(cart_table_body);
	$('#grand_total_table tbody').html(grand_total_table_tbody);
}