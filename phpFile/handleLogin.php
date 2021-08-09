<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'shoe');
$name=$_POST['uname1'];
$pass=$_POST['upswd1'];
$result=mysqli_query($con,"SELECT uname1,upswd1 FROM register WHERE uname1 = '$name' && upswd1 = '$pass'");

$num=mysqli_num_rows($result);

        if($num==1){         
            $_SESSION['username'] = $name;   
            header("Location:landingPage.php");
        }
        else{
            echo '<script type="text/JavaScript"> 
            alert("Please check your input !!!");
            window.location.href="index.php";
            </script>';
        }
?>




    
