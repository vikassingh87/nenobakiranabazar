<?php
   session_start();
   if(!isset($_GET['trans_id']) || empty($_GET['trans_id'])){
       header('Location:sales.php');
   }
   date_default_timezone_set('Asia/Calcutta'); 
   include('../connection.php');
    $dt=date('m-y');
    $invoice='NKB/'.$dt.'/'.rand(100000,9999999);
   $order_purchase_id = base64_decode($_GET['trans_id']);
   $sql = "SELECT * FROM order_purchase WHERE id = '$order_purchase_id'";
   $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
   if(mysqli_num_rows($query) == 0){
       echo "<script>alert('Invalid transaction id..');window.location.href='sales.php';</script>";
   }
   $row = mysqli_fetch_assoc($query);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <style>
         * {
         font-size: 12px;
         font-family: 'Times New Roman';
         }
         th,
         table {
         /*border-top: 1px solid black;*/
         border-collapse: collapse;
         border-bottom:dashed 1px #000;
         }
         .dash {
         /*border-top: 1px solid black;*/
         border-collapse: collapse;
         border-bottom:dashed 1px #000;
         }
         td.description,
         th.description {
         width: 75px;
         max-width: 75px;
         }
         th.description1 {
         width: 75px;
         max-width: 75px;
         }
         td.quantity,
         th.quantity {
         width: 40px;
         max-width: 40px;
         word-break: break-all;
         }
         td.price,
         th.price {
         width: 40px;
         max-width: 40px;
         word-break: break-all;
         }
         .centered {
         text-align: center;
         align-content: center;
         font-size: 18px;
         }
         .centered1 {
         text-align: center;
         align-content: center;
         }
         .ticket {
         /*width: 155px;*/
         /*max-width: 155px;*/
         background-color: #fff;
         }
         img {
         max-width: inherit;
         width: inherit;
         }
         @media print {
         .hidden-print,
         .hidden-print * {
         display: none !important;
         }
         }
         .b{
         border-bottom:dashed 1px #000;
         }
         span{
         color:#000;
         }
      </style>
   </head>
   <body onload="startTime()">
      <center>
         <img src="assets/logo1.png" alt="Logo" class="centered" style="max-width: 80px;">     
         <table>
            <thead>
               <tr>
                  <th colspan="10" ></th>
               </tr>
            </thead>
            <thead>
               <tr>
                  <th colspan="10" >Shop No.5 Savita Apartmentm,
                     Kelkar Road,Virar(E).<br>
                     Dist.Thane.
                     Phone No:9834637366
                     GSTIN: 27AJQPJ8511Q1ZE
                  </th>
               </tr>
            </thead>
         </table>
         <h1>TAX INVOICE</h1>
         Invoice No     : <?=$invoice;?><br>
         GST Ref No. : A34P1920-0001477<br>
         Date           :<?=date('d-m-Y'); ?>
         <table>
         </table>
         <table>
            <thead>
               <tr>
                  <th colspan="7"></th>
               </tr>
            </thead>
            <thead>
               <tr>
                  <th class="quantity">Sn</th>
                  <th class="description" colspan="2">Product Name</th>
                  <th class="price">QTY</th>
                  <th class="price">Price</th>
                  <th class="price">NBK <br>Price</th>
                  <th class="description">Amount</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $net_payable = $total_quantity = $total_price = $total_nkb_price = 0;
                  $gst_percentage = 4;
                  $sql2 = "SELECT * FROM purchase_details WHERE order_purchase_id = '$order_purchase_id'";
                  $query2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                  if(mysqli_num_rows($query2) > 0){ 
                      $i = 1;
                      while($row2 = mysqli_fetch_assoc($query2)) {
                        $quantity         = $row2['quantity'];
                        $product_price    = $row2['product_price'];
                        $product_nkb_price = $row2['product_nkb_price'];
                        $total_quantity   += $quantity;
                        $total_price      += $product_price * $quantity;
                        $total_nkb_price  += $product_nkb_price * $quantity;
                      ?>
                     <tr>
                          <td class="centered1 dash"><?=$i++;?></td>
                          <td class="centered1 dash" colspan="2"><?=$row2['product_name'];?></td>
                          <td class="centered1 dash"><?=$row2['quantity'];?></td>
                          <td class="centered1 dash"><?=$row2['product_price'];?></td>
                          <td class="centered1 dash"><?=$row2['product_nkb_price'];?></td>
                          <td class="centered1 dash"><?=$row2['sub_total'];?></td>
                      </tr>
               <?php } 
                  } 
                  $total_saved_price = $total_price - $total_nkb_price;
                  $net_payable = $total_nkb_price; 
               ?>
            </tbody>
            <thead>
               <tr>
                  <th>Total:</th>
                  <th></th>
                  <th></th>
                  <th><?=$total_quantity;?></th>
                  <th></th>
                  <th></th>
                  <th><?=number_format($total_nkb_price,2);?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(!empty($row['user_id'])){ ?>
                  <tr>
                     <td>Cash</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="centered1">
                        <?php
                           $total_amount_to_be_paid = $row['total_amount_to_be_paid'];
                           $net_payable = $total_amount_to_be_paid;
                           echo $total_amount_to_be_paid;
                        ?>
                     </td>
                  </tr>
                  <tr>
                     <td>Wallet</td>
                     <td></td>
                     <td></td>
                     <td><?=$row['user_id'];?></td>
                     <td></td>
                     <td></td>
                     <td class="centered1"><?=number_format($row['users_total_wallet_balance_used'],2);?></td>
                  </tr>
               <?php } ?>
               <tr class="dash">
                  <td style="font-weight: bold;" colspan="3">Grand Total</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="centered1" style="font-weight: bold;"><?=$net_payable;?></td>
               </tr>
            </tbody>
            <tbody>
              <?php
                  $gst_amount = ($net_payable*$gst_percentage)/100;
                  $net_payable = $net_payable+$gst_amount;
               ?>
               <tr>
                  <td style="font-weight: bold;" colspan="3">GST Summary</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td colspan="3" style="font-weight: bold;">Tax Desc</td>
                  <td class="centered1" style="font-weight: bold;">Taxable(%)</td>
                  <td class="centered1" style="font-weight: bold;"></td>
                  <td class="centered1" style="font-weight: bold;"></td>
                  <td class="centered1" style="font-weight: bold;"></td>
               </tr>
               <tr>
                  <td colspan="3">GST </td>
                  <td class="centered1">4</td>
                  <td class="centered1"></td>
                  <td class="centered1"></td>
                  <td class="centered1"><?=$gst_amount;?></td>
               </tr>
               <tr class="dash">
                  <td colspan="7"></td>                 
               </tr>
               <tr class="dash">
                  <td style="font-weight: bold;" colspan="3">Net Payable</td>
                  <td class="centered1" style="font-weight: bold;"></td>
                  <td class="centered1" style="font-weight: bold;"></td>
                  <td class="centered1" style="font-weight: bold;"></td>
                  <td class="centered1" style="font-weight: bold;"><?=$net_payable;?></td>
               </tr>
            </tbody>
            <tbody>
               <tr>
                  <td style="font-weight: bold;" colspan="3">Terms & Condition</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td colspan="7">(1) Goods once sold cannot be returned or exchanged.</td>
               </tr>
               <tr>
                  <td colspan="7">(2) Customers are liable to pay the entire amount of the order at the time of purchase.</td>
               </tr>
               <tr>
                  <td colspan="7">(3) No Guarantee for opened product.</td>
               </tr>
            </tbody>
         </table>
         <h1>* * Saved Rs. <?=$total_saved_price;?>/- ON MRP * Rs. <?=$total_nkb_price;?>*</h1>
         <?php
            echo $barcode_img= '<img class="barcode" alt="'. $invoice.'" src="barcode.php?text='. $invoice.'&codetype=code128&orientation=horizontal&size=20&print=true"/>';
            
            ?>
         <h1 style="font-weight: bold;">THANK YOU PLEASE VISIT AGAIN</h1>
      </center>
      <center><button id="btnPrint" class="hidden-print btn btn-success">Print</button></center>
   </body>
</html>