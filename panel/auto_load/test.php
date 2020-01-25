<?php

include("../../connection.php");
 $auto=mysqli_query($conn,"SELECT * FROM `user`");
 while($load=mysqli_fetch_assoc($auto))
 {
   $myid=$load['uname'];
   $sponsarid=$load['under_userid'];
  $insert=mysqli_query($conn,"INSERT INTO `test`(`uname`,`sponsorid`) VALUES ('$myid','$sponsarid')");
}
?> 

<?php
        $to = "sandeepdigicraft@gmail.com";
		$subject = "Cronjob";
		$txt = " If you get this mail thats mean your code works fine. ";
		$headers = "From:krishnakantdigicraft@gmail.com";
		mail($to,$subject,$txt,$headers); 
?>