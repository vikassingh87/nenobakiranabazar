<?php
include '../connection.php';


$sql = "SELECT account FROM user WHERE uname = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid);
$stmt->fetch();
$stmt->close();

echo "<label><b>$cid</b></label>";
?>