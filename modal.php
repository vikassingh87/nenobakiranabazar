<?php
require_once('connection.php');
if(isset($_POST['type']) && $_POST['type'] == 'get_purchase_details_modal'){
	$order_purchase_id = $_POST['order_purchase_id'];
	$html = '';
	if((!empty($order_purchase_id))){
		$html .= '<div class="modal-dialog" role="document">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <h5 class="modal-title" id="exampleModalLabel">Purchase Details</h5>
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                        </button>
	                    </div>
	                    <div class="modal-body">
	                        <div class="table-responsive">
	                    <table id="zero_config" class="table table-striped table-bordered">
	                <thead style="font-size: 11px;background-color: #27a9e3;color: #ffffff;">
	                    <tr>
	                        <th>Sr.</th>
	                        <th>Barcode</th>                                               
	                        <th>Product Name</th>                           
	                        <th>MRP Price</th>
	                        <th>NKB Price</th>
	                        <th>Quantity</th>
	                        <th>Discount</th>
	                        <th>Subtotal</th>
	                    </tr>
	                </thead>
	                <tbody style="font-size: 11px;">';	
	    ob_start();

        $j=1;
        $sql=mysqli_query($conn,"SELECT * FROM purchase_details where order_purchase_id=$order_purchase_id") or die(mysqli_error($conn));
        while($data=mysqli_fetch_assoc($sql))
        {
            extract($data);
    
            ?>
            <tr>
                <td><?=$j?></td>
                <td><?=$bar_code.'<br>'; 
                echo $barcode_img= '<img class="barcode" alt="'. $bar_code.'" src="barcode.php?text='. $bar_code.'&codetype=code128&orientation=horizontal&size=20&print=true"/>';?></td>
                <td><?=$product_name?></td>
                <td><?=$product_price?></td>
                <td><?=$product_nkb_price?></td>
                <td><?=$quantity?></td>
                <td><?=$discount?></td>
                <td><?=$sub_total?></td>
                
            </tr>
       <?php $j++; }
                                            
	    $html .= ob_get_clean();
	    $html .= '</tbody></table>';
	}
	echo json_encode(array(
		'html' => $html
	));
}