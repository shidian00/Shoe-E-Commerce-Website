<?php
session_start();
$_SESSION['username'] = "Guest";

header("Location:landingPage.php");
?>