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
				alert(res.message);
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