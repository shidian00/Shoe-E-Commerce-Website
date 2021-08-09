<?php

include "dbConn.php"; 
session_start();
$username = $_SESSION['username'];

function function_alert($message) 
{
     echo "<script>alert('$message');</script>";
}

$shoeid = (int) trim($_GET['shoeid']); 


if(isset($_POST['submit']))
{
    if(!empty($_POST['review']))
    {
        $review = $_POST['review'];

        $sqlInsert = "INSERT INTO `review` (`reviewid`, `review`, `shoeid`,`uname1`) VALUES (NULL, '$review', '$shoeid','$username');";

      if ($db->query($sqlInsert) === TRUE) 
      {
        function_alert("Review Successfully!!! Thank you !!");

        header("refresh:0, url = productDesc.php?shoeid=$shoeid");

      } else 
      {
        function_alert("Review Failed !!! Please dun exceed 1500 character !!!");
        header("refresh:0, url = productDesc.php?shoeid=$shoeid");

      }
    }
}