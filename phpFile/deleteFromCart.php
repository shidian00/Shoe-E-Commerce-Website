<?php
include "dbConn.php";
session_start();


$username = (String)$_SESSION['username'];
$deleteid = (int) trim($_GET['deleteid']); 

echo $username;
echo $deleteid;


$sql = "DELETE FROM `cart` WHERE (`cart`.`cartid` = $deleteid AND uname1 = '$username');";
if (mysqli_query($db, $sql)) {
    header("Location: cart.php");
 } else {
    echo "Error: " . $sql . "" . mysqli_error($db);
 }

?>