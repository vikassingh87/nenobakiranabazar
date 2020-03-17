<?php 
<<<<<<< HEAD
include '../connection.php';
function generateBarcode(){
  	 global $conn;
   	$barcode=rand(100000000,999999999);
   	$sql=mysqli_query($conn,"SELECT * FROM product_details WHERE barcode='$barcode'") or die(mysqli_error($conn));
   	if(mysqli_affected_rows($conn)){
      	generateBarcode();
   	}
   	else{
     	return $barcode;
   	}
=======
//include '../connection.php';
function generateBarcode()
{
   global $conn;
   $barcode=rand(100000000,999999999);
   $sql=mysqli_query($conn,"SELECT * FROM product_details WHERE barcode='$barcode'") or die(mysqli_error($conn));
   if(mysqli_affected_rows($conn))
   {
      generateBarcode();
   }
   else
   {
     return $barcode;
   }
>>>>>>> dev
}

?>