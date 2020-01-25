<?php 
include('connection.php');
if(isset($_POST["id"]))
{
	
	$result = '';
	$i=1;
	 $query = "SELECT * from user where user_id='".$_POST["id"]."' and status='1' order by id desc ";
	$sql = mysqli_query($conn, $query);
	$result .='
	
	<table class="table table-bordered" id="tblData">
	<tr>
	 						   <th>S.n.</th>
                                
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>Sponsar Id</th>
                                <th>Email Id</th>
                                 <th>User Mobile No</th>
                                 <th>Password</th>
                                  <th>Date of Joining</th>
                                    <th>Bank Details</th>
                                  <th>Operations</th>
                                   <th>BinaryView id wise</th>
	</tr>';
	if([$sql] > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			

			$result .='
			
			<tr>
			<td>'. $i.' </td>
			<td>'.$row["uname"].'</td>
			<td>'.$row["account"].'</td>
			<td>'.$row["under_userid"].'</td>
			<td>'.$row["address"].'</td>
			<td>'. $row["mobile"].'</td>
            <td>'. $row["password"].'</td>
            <td>'. $row["date_joining"].'</td>
            <td><a href="acc_view.php?user_id='.$row['uname'].'">View</a></td>
            <td><a href="edit.php?id='.$row['id'].' ">Edit/Block Id</a></td> 
            <td><a href="tree.php?user_id='.$row['uname'].' ">Search</a></td>
            
			
                                 
                                      
                                            
                                           
                                          
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

// search by id from registered id

if(isset($_POST["id1"]))
{
	
	$result = '';
	$i=1;
	 $query = "SELECT * from user where user_id='".$_POST["id1"]."' and status='0' order by id desc ";
	$sql = mysqli_query($conn, $query);
	$result .='
	
	<table class="table table-bordered" id="tblData">
	<tr>
	 						   <th>S.n.</th>
                                
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>Sponsar Id</th>
                                <th>Email Id</th>
                                 <th>User Mobile No</th>
                                 <th>Password</th>
                                  <th>Date of Joining</th>
                                  <th>Operations</th>
                                   
                                    
	</tr>';
	if([$sql] > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			

			$result .='
			
			<tr>
			<td>'. $i.' </td>
			<td>'.$row["uname"].'</td>
			<td>'.$row["account"].'</td>
			<td>'.$row["under_userid"].'</td>
			<td>'.$row["address"].'</td>
			<td>'. $row["mobile"].'</td>
            <td>'. $row["password"].'</td>
            <td>'. $row["date_joining"].'</td>
            <td><a href="edit_red.php?id='.$row['id'].'">Edit</a></td>
                                    
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