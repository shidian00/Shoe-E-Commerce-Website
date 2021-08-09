<?php
session_start();
include "dbConn.php";

$uname1=$_POST['uname1'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$upswd1=$_POST['upswd1'];
$upswd2=$_POST['upswd2'];
$checker = true;


if(!isset($_POST['gender'])){
    $checker = false;
    echo '<script type="text/JavaScript"> 
    alert("Please select your gender !!!");
    window.location.href="signup.php";
    </script>';
}

if(!empty($uname1)||!empty($gender)||!empty($email)||!empty($upswd1)||!empty($upswd2))
{
    if($upswd1!=$upswd2)
    {
        $checker = false;
        echo '<script type="text/JavaScript"> 
             alert("Please check your password input !!!");
             window.location.href="signup.php";
             </script>';
    }
    
    $sql = "SELECT * FROM register;";
    
    $getResult = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_array($getResult)){
    
    if($row['uname1'] == $uname1){
        $checker = false;

        echo '<script type="text/JavaScript"> 
             alert("Sorry someone already take the username !!!!");
             window.location.href="signup.php";
             </script>';
             break;
            }
            if($row['email'] == $email){
                $checker = false;

                echo '<script type="text/JavaScript"> 
                alert("Sorry someone already user this email !!!!");
                window.location.href="signup.php";
                </script>';
                break;
            }
    }

    if($checker == true)
    {
        $insertSql = "INSERT INTO `register` (`uname1`, `gender`, `email`, `upswd1`, `upswd2`) VALUES ('$uname1', '$gender', '$email', '$upswd1', '$upswd2');";
        if(mysqli_query($db,$insertSql)){
            echo '<script type="text/JavaScript"> 
            alert("Register Successfully !!!");
            window.location.href="index.php";
            </script>';    
        }
    }


}else{
    echo '<script type="text/JavaScript"> 
         alert("Please make sure all field is entered INCLUDING THE GENDER !!!!");
         window.location.href="signup.php";
         </script>';    
}

?>
