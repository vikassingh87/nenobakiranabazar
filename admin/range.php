<?php
include('connection.php');
//$conn = mysqli_connect("localhost", "root", "", "ideal250");
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	
	$result = '';
	$i=1;
	 $query = "SELECT withdrawal_list.uname,withdrawal_list.amount,withdrawal_list.paid_amt,withdrawal_list.tds,withdrawal_list.date,account.uname,account.name,account.mobile,account.bank,account.ac_no,account.ifsc FROM withdrawal_list join account on withdrawal_list.uname=account.uname WHERE date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	
	<table class="table table-bordered" id="tblData">
	<tr>
	 						    <th>S.n.</th>
                                <th>Sponsar Id</th>                                
                                <th>Amount</th>
                                <th>Paid Amount</th>
                                <th>TDS 15%</th>
                                 <th>Account Holder Name</th>
                                  <th>Mobile</th>
                                 <th>Bank Name</th>
                                 <th>Account Number</th>
                                  <th>IFSC Code</th>
                                 
                                <th>Date of Payment</th> 
	</tr>';
	if([$sql] > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			//  $id=$row['id'];
			  //$name=$row['uname'];
			// $gender=$row['gender'];
			// $designation=$row['designation'];
			// $date_payment=$row['date_payment'];

			$result .='
			
			<tr>
			<td>'. $i.' </td>
			<td>'.$row["uname"].'</td>
			<td>'.$row["amount"].'</td>
			<td>'.$row["paid_amt"].'</td>
			<td>'.$row["tds"].'</td>
			<td>'. $row["name"].'</td>
          <td>'. $row["mobile"].'</td>
          <td>'. $row["bank"].'</td>
          <td>'. $row["ac_no"].'</td>
          <td>'. $row["ifsc"].'</td>
       
          <td>'.$row["date"].'</td>
			
                                 
                                      
                                            
                                           
                                          
			</tr>';
			$i++;
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Record Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}

// serach by id
if(isset($_POST["id"]))
{
	
	$result = '';
	$i=1;
	 $query = "SELECT withdrawal_list.uname,withdrawal_list.amount,withdrawal_list.paid_amt,withdrawal_list.tds,withdrawal_list.date,account.uname,account.name,account.mobile,account.bank,account.ac_no,account.ifsc FROM withdrawal_list join account on withdrawal_list.uname=account.uname WHERE withdrawal_list.uname= '".$_POST["id"]."' ";
	$sql = mysqli_query($conn, $query);
	$result .='
	
	<table class="table table-bordered" id="tblData">
	<tr>
	 						    <th>S.n.</th>
                                <th>Sponsar Id</th>                                
                                <th>Amount</th>
                                <th>Paid Amount</th>
                                <th>TDS 15%</th>
                                 <th>Account Holder Name</th>
                                  <th>Mobile</th>
                                 <th>Bank Name</th>
                                 <th>Account Number</th>
                                  <th>IFSC Code</th>
                                 
                                <th>Date of Payment</th> 
	</tr>';
	if([$sql] > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			//  $id=$row['id'];
			  //$name=$row['uname'];
			// $gender=$row['gender'];
			// $designation=$row['designation'];
			// $date_payment=$row['date_payment'];

			$result .='
			
			<tr>
			<td>'. $i.' </td>
			<td>'.$row["uname"].'</td>
			<td>'.$row["amount"].'</td>
			<td>'.$row["paid_amt"].'</td>
			<td>'.$row["tds"].'</td>
			<td>'. $row["name"].'</td>
                                          <td>'. $row["mobile"].'</td>
                                          <td>'. $row["bank"].'</td>
                                          <td>'. $row["ac_no"].'</td>
                                          <td>'. $row["ifsc"].'</td>
                                         
                                          <td>'.$row["date"].'</td>
			
                                 
                                      
                                            
                                           
                                          
			</tr>';
			$i++;
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Record Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}


// roi
if(isset($_POST["From_roi"], $_POST["to_roi"]))
{
	
	$result = '';
	$i=1;
	 $query = "SELECT roi_list.uname,roi_list.amount,roi_list.paid_amt,roi_list.tds,roi_list.created_date,account.uname,account.name,account.mobile,account.bank,account.ac_no,account.ifsc FROM roi_list join account on roi_list.uname=account.uname WHERE created_date BETWEEN '".$_POST["From_roi"]."' AND '".$_POST["to_roi"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	
	<table class="table table-bordered" id="tblData">
	<tr>
	 						    <th>S.n.</th>
                                <th>Sponsar Id</th>                                
                                <th>Amount</th>
                                <th>Paid Amount</th>
                                <th>TDS 15%</th>
                                 <th>Account Holder Name</th>
                                  <th>Mobile</th>
                                 <th>Bank Name</th>
                                 <th>Account Number</th>
                                  <th>IFSC Code</th>
                                 
                                <th>Date of Payment</th> 
	</tr>';
	if([$sql] > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			//  $id=$row['id'];
			  //$name=$row['uname'];
			// $gender=$row['gender'];
			// $designation=$row['designation'];
			// $date_payment=$row['date_payment'];

			$result .='
			
			<tr>
			<td>'. $i.' </td>
			<td>'.$row["uname"].'</td>
			<td>'.$row["amount"].'</td>
			<td>'.$row["paid_amt"].'</td>
			<td>'.$row["tds"].'</td>
			<td>'. $row["name"].'</td>
          <td>'. $row["mobile"].'</td>
          <td>'. $row["bank"].'</td>
          <td>'. $row["ac_no"].'</td>
          <td>'. $row["ifsc"].'</td>
       
          <td>'.$row["created_date"].'</td>
			
                                 
                                      
                                            
                                           
                                          
			</tr>';
			$i++;
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Record Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}

// serach by id
if(isset($_POST["id_roi"]))
{
	
	$result = '';
	$i=1;
	 $query = "SELECT roi_list.uname,roi_list.amount,roi_list.paid_amt,roi_list.tds,roi_list.created_date,account.uname,account.name,account.mobile,account.bank,account.ac_no,account.ifsc FROM roi_list join account on roi_list.uname=account.uname WHERE roi_list.uname= '".$_POST["id_roi"]."' ";
	$sql = mysqli_query($conn, $query);
	$result .='
	
	<table class="table table-bordered" id="tblData">
	<tr>
	 						    <th>S.n.</th>
                                <th>Sponsar Id</th>                                
                                <th>Amount</th>
                                <th>Paid Amount</th>
                                <th>TDS 15%</th>
                                 <th>Account Holder Name</th>
                                  <th>Mobile</th>
                                 <th>Bank Name</th>
                                 <th>Account Number</th>
                                  <th>IFSC Code</th>
                                 
                                <th>Date of Payment</th> 
	</tr>';
	if([$sql] > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			//  $id=$row['id'];
			  //$name=$row['uname'];
			// $gender=$row['gender'];
			// $designation=$row['designation'];
			// $date_payment=$row['date_payment'];

			$result .='
			
			<tr>
			<td>'. $i.' </td>
			<td>'.$row["uname"].'</td>
			<td>'.$row["amount"].'</td>
			<td>'.$row["paid_amt"].'</td>
			<td>'.$row["tds"].'</td>
			<td>'. $row["name"].'</td>
                                          <td>'. $row["mobile"].'</td>
                                          <td>'. $row["bank"].'</td>
                                          <td>'. $row["ac_no"].'</td>
                                          <td>'. $row["ifsc"].'</td>
                                         
                                          <td>'.$row["created_date"].'</td>
			
                                 
                                      
                                            
                                           
                                          
			</tr>';
			$i++;
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Record Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}


?>
