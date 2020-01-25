<?php
include("../connection.php");
$q = intval($_GET['q']);

// $con = mysqli_connect('localhost','digicraf_sfcare','Digi@1498','digicraf_sfcare');
// if (!$con) {
//     die('Could not connect: ' . mysqli_error($con));
// }

mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM tree WHERE uname = '".$q."'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {

 $left=$row['left'];
}

echo "Test";
mysqli_close($conn);
?>