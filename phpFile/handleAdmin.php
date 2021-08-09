<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'shoe');
$adminname=$_POST['adminname'];
$pw=$_POST['pswd'];

$result=mysqli_query($con,"SELECT adminname,pswd FROM admin1 WHERE adminname = '$adminname' && pswd = '$pw'");

while($row = mysqli_fetch_array($result)){
    if($adminname == $row['adminname'] && $pw == $row['pswd']){
        $_SESSION['username'] = $adminname;   
        header("Location:adminCreate.php");
    }
}
?>




    
