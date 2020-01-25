<?php
include 'connection.php';


$sql = "SELECT user_name FROM user WHERE user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid);
$stmt->fetch();
$stmt->close();

// echo "<table>";
// echo "<tr>";
// echo "<th>Name</th>";
// echo "<td>" . $cid . "</td>";

// echo "</table>";
echo "<input type='text' name='sponsor_name' value='$cid'>";
?>