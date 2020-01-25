<?php
/*session_start();
include('connection.php');*/
/*$user_id = '808298';
$right_count_for_payout = 0;
$left_count_payout = 0;
echo "<br>Total Payouty = ".generatePayout($user_id);*/
function generatePayout($user_id){
	global $conn,$left_count_payout,$right_count_for_payout;
	 $total_left_count = getCount($user_id,'left');
	 $total_right_count = getCount($user_id,'right');
	$total_payout = 0;

	    $myid=$_SESSION["userid"];
		$query="select count(*) as count from user where under_userid='$myid' and status='1'";
		$result=mysqli_query($conn,$query);
		$fetch=mysqli_fetch_assoc($result);
		$count=$fetch['count'];
		$query1="select * from user where uname='$myid'";
		$result1=mysqli_query($conn,$query1);
		$fetch1=mysqli_fetch_assoc($result1);
	   $package=$fetch1['package'];
	  // echo $total_left_count;
	  // echo $total_right_count;
	   if($package=='5900')
	   {
		if($count>=2){
	// echo "Total Left Count : ".$total_left_count;
	// echo "<br>Total Right Count : ".$total_right_count;
	if(($total_left_count>=2 && $total_right_count>=1) || ($total_left_count >=1 && $total_right_count>=2)){

		//echo $a="SELECT * from tree where uname='$myid'";
		$q=mysqli_query($conn,"select * from tree where uname='$myid'");
		$f=mysqli_fetch_assoc($q);
	    $l=$f['left'];
		 $r=$f['right'];

		$l1=mysqli_query($conn,"select * from user where uname='$l'");
		$lf=mysqli_fetch_assoc($l1);
		 $lp=$lf['package'];

		$r1=mysqli_query($conn,"select * from user where uname='$r'");
		$rf=mysqli_fetch_assoc($r1);
		 $rp=$rf['package'];

		if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				//echo $t=5000/100*10;
		     $total_payout += 450;
			}
			elseif($lp=='11800') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 900;
			}
			elseif($lp=='29500') 
			{
				//echo $t=25000/100*10;
		    $total_payout += 2250;
			}
			elseif($lp=='59000') 
			{
				//echo $t=50000/100*10;
		    $total_payout += 4500;
			}
			elseif($lp=='118000') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 9000;
			}
			else
			{
				//echo $t=5000/100*10;
		     $total_payout += 900;
			}
			
		}
		else
		{
			$total_payout += 450;
		}
		if($total_left_count>=2 && $total_right_count>=1){
			 $total_left_count = $total_left_count-2;
			$total_right_count = $total_right_count-1;
		}
		else{
			$total_left_count = $total_left_count-1;
			$total_right_count = $total_right_count-1;
		}
		// echo "<br>New Total Left Count : ".$total_left_count;
		// echo "<br>New Total Right Count : ".$total_right_count;
		$total_payout_count = 0;
		if($total_left_count>0 && $total_right_count>0){
			if($total_left_count<=$total_right_count){
				 $total_payout_count = $total_left_count;
			}
			
			if($total_right_count<=$total_left_count){
				 $total_payout_count = $total_right_count;
			}
			
		}
		// echo "<br>New Total Left Count After Payout : ".($total_left_count-$total_payout_count);
		// echo "<br>New Total Right Count After Payout : ".($total_right_count-$total_payout_count);
		if($total_payout_count>0){
			if($lp==$rp)
			{
			if ($lp=='5900') 
			{
				
		     $total_payout += $total_payout_count*450;
			}
			elseif($lp=='11800') 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			elseif($lp=='29500') 
			{
				
		    $total_payout += $total_payout_count*2250;
			}
			elseif($lp=='59000') 
			{
				
		    
		    $total_payout += $total_payout_count*4500;
			}
			elseif($lp=='118000') 
			{
				
		    $total_payout += $total_payout_count*9000;
			}
			else
			{
				
		     $total_payout += $total_payout_count*900;
			}
			
		}
		else
		{
			
			$total_payout += $total_payout_count*450;

		}
			//$total_payout += $total_payout_count*450;
		}
	}
	return $total_payout;
}
}
elseif($package=='11800')
{
			if($count>=2){
	// echo "Total Left Count : ".$total_left_count;
	// echo "<br>Total Right Count : ".$total_right_count;
	if(($total_left_count>=2 && $total_right_count>=1) || ($total_left_count >=1 && $total_right_count>=2)){
		$q=mysqli_query($conn,"select * from tree where uname='$myid'");
		$f=mysqli_fetch_assoc($q);
		 $l=$f['left'];
		 $r=$f['right'];

		$l1=mysqli_query($conn,"select * from user where uname='$l'");
		$lf=mysqli_fetch_assoc($l1);
		 $lp=$lf['package'];

		$r1=mysqli_query($conn,"select * from user where uname='$r'");
		$rf=mysqli_fetch_assoc($r1);
		 $rp=$rf['package'];

		if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				//echo $t=5000/100*10;
		     $total_payout += 450;
			}
			elseif($lp=='11800') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 900;
			}
			elseif($lp=='29500') 
			{
				//echo $t=25000/100*10;
		    $total_payout += 2250;
			}
			elseif($lp=='59000') 
			{
				//echo $t=50000/100*10;
		    $total_payout += 4500;
			}
			elseif($lp=='118000') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 9000;
			}
			else 
			{
				//echo $t=5000/100*10;
		     $total_payout += 900;
			}
			
		}
		else
		{
			$total_payout += 990;
		}
		if($total_left_count>=2 && $total_right_count>=1){
			$total_left_count = $total_left_count-2;
			$total_right_count = $total_right_count-1;
		}
		else{
			$total_left_count = $total_left_count-1;
			$total_right_count = $total_right_count-1;
		}
		// echo "<br>New Total Left Count : ".$total_left_count;
		// echo "<br>New Total Right Count : ".$total_right_count;
		$total_payout_count = 0;
		if($total_left_count>0 && $total_right_count>0){
			if($total_left_count<=$total_right_count){
				$total_payout_count = $total_left_count;
			}
			if($total_right_count<=$total_left_count){
				$total_payout_count = $total_right_count;
			}
		}
		// echo "<br>New Total Left Count After Payout : ".($total_left_count-$total_payout_count);
		// echo "<br>New Total Right Count After Payout : ".($total_right_count-$total_payout_count);
		if($total_payout_count>0){
					if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				
		     $total_payout += $total_payout_count*450;
			}
			elseif($lp=='11800') 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			elseif($lp=='29500') 
			{
				
		    $total_payout += $total_payout_count*2250;
			}
			elseif($lp=='59000') 
			{
				
		    
		    $total_payout += $total_payout_count*4500;
			}
			elseif($lp=='118000') 
			{
				
		    $total_payout += $total_payout_count*9000;
			}
			else 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			
		}
		else
		{
			
			$total_payout += $total_payout_count*900;

		}
			//$total_payout += $total_payout_count*990;
		}
	}
	return $total_payout;
}
}

elseif($package=='29500'){
			if($count>=2){
	// echo "Total Left Count : ".$total_left_count;
	// echo "<br>Total Right Count : ".$total_right_count;
	if(($total_left_count>=2 && $total_right_count>=1) || ($total_left_count >=1 && $total_right_count>=2)){
		$q=mysqli_query($conn,"select * from tree where uname='$myid'");
		$f=mysqli_fetch_assoc($q);
		 $l=$f['left'];
		 $r=$f['right'];

		$l1=mysqli_query($conn,"select * from user where uname='$l'");
		$lf=mysqli_fetch_assoc($l1);
		 $lp=$lf['package'];

		$r1=mysqli_query($conn,"select * from user where uname='$r'");
		$rf=mysqli_fetch_assoc($r1);
		 $rp=$rf['package'];

		if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				//echo $t=5000/100*10;
		     $total_payout += 450;
			}
			elseif($lp=='11800') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 900;
			}
			elseif($lp=='29500') 
			{
				//echo $t=25000/100*10;
		    $total_payout += 2250;
			}
			elseif($lp=='59000') 
			{
				//echo $t=50000/100*10;
		    $total_payout += 4500;
			}
			elseif($lp=='118000') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 9000;
			}
			else 
			{
				//echo $t=25000/100*10;
		    $total_payout += 900;
			}
			
		}
		else
		{
		$total_payout += 2250;
	}
		if($total_left_count>=2 && $total_right_count>=1){
			$total_left_count = $total_left_count-2;
			$total_right_count = $total_right_count-1;
		}
		else{
			$total_left_count = $total_left_count-1;
			$total_right_count = $total_right_count-1;
		}
		// echo "<br>New Total Left Count : ".$total_left_count;
		// echo "<br>New Total Right Count : ".$total_right_count;
		$total_payout_count = 0;
		if($total_left_count>0 && $total_right_count>0){
			if($total_left_count<=$total_right_count){
				$total_payout_count = $total_left_count;
			}
			if($total_right_count<=$total_left_count){
				$total_payout_count = $total_right_count;
			}
		}
		// echo "<br>New Total Left Count After Payout : ".($total_left_count-$total_payout_count);
		// echo "<br>New Total Right Count After Payout : ".($total_right_count-$total_payout_count);
		if($total_payout_count>0){
			if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				
		     $total_payout += $total_payout_count*450;
			}
			elseif($lp=='11800') 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			elseif($lp=='29500') 
			{
				
		    $total_payout += $total_payout_count*2250;
			}
			elseif($lp=='59000') 
			{
				
		    
		    $total_payout += $total_payout_count*4500;
			}
			elseif($lp=='118000') 
			{
				
		    $total_payout += $total_payout_count*9000;
			}
			else 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			
		}
		else
		{
			
			$total_payout += $total_payout_count*2250;

		}
			//$total_payout += $total_payout_count*2250;
		}
	}
	return $total_payout;
}
}

elseif($package=='59000'){
			if($count>=2){
	// echo "Total Left Count : ".$total_left_count;
	// echo "<br>Total Right Count : ".$total_right_count;
	if(($total_left_count>=2 && $total_right_count>=1) || ($total_left_count >=1 && $total_right_count>=2)){
		$q=mysqli_query($conn,"select * from tree where uname='$myid'");
		$f=mysqli_fetch_assoc($q);
		 $l=$f['left'];
		 $r=$f['right'];

		$l1=mysqli_query($conn,"select * from user where uname='$l'");
		$lf=mysqli_fetch_assoc($l1);
		 $lp=$lf['package'];

		$r1=mysqli_query($conn,"select * from user where uname='$r'");
		$rf=mysqli_fetch_assoc($r1);
		 $rp=$rf['package'];

		if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				//echo $t=5000/100*10;
		     $total_payout += 450;
			}
			elseif($lp=='11800') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 900;
			}
			elseif($lp=='29500') 
			{
				//echo $t=25000/100*10;
		    $total_payout += 2250;
			}
			elseif($lp=='59000') 
			{
				//echo $t=50000/100*10;
		    $total_payout += 4500;
			}
			elseif($lp=='118000') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 9000;
			}
			else
			{

			$total_payout += 900;
			}
			
		}
		else{

		$total_payout += 4500;
	}
		if($total_left_count>=2 && $total_right_count>=1){
			$total_left_count = $total_left_count-2;
			$total_right_count = $total_right_count-1;
		}
		else{
			$total_left_count = $total_left_count-1;
			$total_right_count = $total_right_count-1;
		}
		// echo "<br>New Total Left Count : ".$total_left_count;
		// echo "<br>New Total Right Count : ".$total_right_count;
		$total_payout_count = 0;
		if($total_left_count>0 && $total_right_count>0){
			if($total_left_count<=$total_right_count){
				$total_payout_count = $total_left_count;
			}
			if($total_right_count<=$total_left_count){
				$total_payout_count = $total_right_count;
			}
		}
		// echo "<br>New Total Left Count After Payout : ".($total_left_count-$total_payout_count);
		// echo "<br>New Total Right Count After Payout : ".($total_right_count-$total_payout_count);
		if($total_payout_count>0){
					if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				
		     $total_payout += $total_payout_count*450;
			}
			elseif($lp=='11800') 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			elseif($lp=='29500') 
			{
				
		    $total_payout += $total_payout_count*2250;
			}
			elseif($lp=='59000') 
			{
				
		    
		    $total_payout += $total_payout_count*4500;
			}
			elseif($lp=='118000') 
			{
				
		    $total_payout += $total_payout_count*9000;
			}
			else
			{
				
		     $total_payout += $total_payout_count*900;
			}
			
		}
		else
		{
			
			$total_payout += $total_payout_count*4500;

		}
			//$total_payout += $total_payout_count*4500;
		}
	}
	return $total_payout;
}
}

elseif($package=='118000')
{
			if($count>=2){
	// echo "Total Left Count : ".$total_left_count;
	// echo "<br>Total Right Count : ".$total_right_count;
	if(($total_left_count>=2 && $total_right_count>=1) || ($total_left_count >=1 && $total_right_count>=2)){
		$q=mysqli_query($conn,"select * from tree where uname='$myid'");
		$f=mysqli_fetch_assoc($q);
		 $l=$f['left'];
		 $r=$f['right'];

		$l1=mysqli_query($conn,"select * from user where uname='$l'");
		$lf=mysqli_fetch_assoc($l1);
		 $lp=$lf['package'];

		$r1=mysqli_query($conn,"select * from user where uname='$r'");
		$rf=mysqli_fetch_assoc($r1);
		 $rp=$rf['package'];

		if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				//echo $t=5000/100*10;
		     $total_payout += 450;
			}
			elseif($lp=='11800') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 900;
			}
			elseif($lp=='29500') 
			{
				//echo $t=25000/100*10;
		    $total_payout += 2250;
			}
			elseif($lp=='59000') 
			{
				//echo $t=50000/100*10;
		    $total_payout += 4500;
			}
			elseif($lp=='118000') 
			{
				//echo $t=10000/100*10;
		    $total_payout += 9000;
			}
			else{
				$total_payout += 900;
				}
			
		}
	else{
	$total_payout += 9000;
	}
		if($total_left_count>=2 && $total_right_count>=1){
			$total_left_count = $total_left_count-2;
			$total_right_count = $total_right_count-1;
		}
		else{
			$total_left_count = $total_left_count-1;
			$total_right_count = $total_right_count-1;
		}
		// echo "<br>New Total Left Count : ".$total_left_count;
		// echo "<br>New Total Right Count : ".$total_right_count;
		$total_payout_count = 0;
		if($total_left_count>0 && $total_right_count>0){
			if($total_left_count<=$total_right_count){
				$total_payout_count = $total_left_count;
			}
			if($total_right_count<=$total_left_count){
				$total_payout_count = $total_right_count;
			}
		}
		// echo "<br>New Total Left Count After Payout : ".($total_left_count-$total_payout_count);
		// echo "<br>New Total Right Count After Payout : ".($total_right_count-$total_payout_count);
		if($total_payout_count>0){
			if($lp==$rp)
		{
			if ($lp=='5900') 
			{
				
		     $total_payout += $total_payout_count*450;
			}
			elseif($lp=='11800') 
			{
				
		    $total_payout += $total_payout_count*900;
			}
			elseif($lp=='29500') 
			{
				
		    $total_payout += $total_payout_count*2250;
			}
			elseif($lp=='59000') 
			{
				
		    
		    $total_payout += $total_payout_count*4500;
			}
			elseif($lp=='118000') 
			{
				
		    $total_payout += $total_payout_count*9000;
			}
			else
			{
			
			$total_payout += $total_payout_count*900;

			}
			
		}
		else
		{
			
			$total_payout += $total_payout_count*9000;

		}
			//$total_payout += $total_payout_count*9000;
		}
	}
	return $total_payout;
}
}

else{
	return $total_payout;
}
}

function getCount($user_id,$side){
	global $conn,$left_count_payout,$right_count_for_payout;
	// echo "SELECT * FROM user WHERE parent_id='datta1' AND side = 'right'";
	 $sql = mysqli_query($conn,"SELECT * FROM user WHERE parent_id='$user_id' AND side = '$side' AND status='1'") or die(mysqli_error($conn));
	$left_count_payout += 0;
	$right_count_for_payout += 0;
	if(mysqli_num_rows($sql)){
		$row = mysqli_fetch_assoc($sql);
		$first_right_child = $row['uname'];
		// echo "<pre>";
		// print_r($row);
		if($side == 'left'){
			$left_count_payout += 1;
		}
		else{
			$right_count_for_payout += 1;
		}
		getChild($first_right_child,$side);
	}
	if($side == 'left'){
		return $left_count_payout;
	}
	else{
		return $right_count_for_payout;
	}
	// return $count;
}
function getChild($parent_id,$side){
	global $conn,$left_count_payout,$right_count_for_payout;
	$sql = "SELECT uname FROM user WHERE parent_id = '$parent_id' AND status='1'";
	$query = mysqli_query($conn,$sql);
	if($side == 'left'){
		$left_count_payout +=  mysqli_num_rows($query);
	}
	else{
		$right_count_for_payout += mysqli_num_rows($query);
	}
	while($row = mysqli_fetch_assoc($query)){
		$first_right_child = $row['uname'];
		getChild($first_right_child,$side);
	}
}

?>