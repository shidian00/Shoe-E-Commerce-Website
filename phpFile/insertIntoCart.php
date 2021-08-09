<?php
include "dbConn.php";
session_start();

$username = (String)$_SESSION['username'];
$shoeid = (int) trim($_GET['shoeid']); 

if(!isset($_POST['size']) || !isset($_POST['quantity'])){
    $_POST['size'] = 40;
    $_POST['quantity'] = 1;
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
}
else
{
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
}


$sql = "SELECT * from cart where cart.shoeid = $shoeid AND cart.uname1 = '$username'";

$getResult = mysqli_query($db,$sql);

if (mysqli_num_rows($getResult)==0) 
{ 
    $sqlNew = "INSERT INTO `cart` (`cartid`, `quantity`, `shoeid`, `uname1`,`size`) VALUES (NULL, $quantity, $shoeid, '$username',$size);";
    if (mysqli_query($db, $sqlNew)) {
        header("Location: cart.php");
    } else {
        echo "Error: " . $sqlNew . "" . mysqli_error($db);
        
    }
 }else
    while($data = mysqli_fetch_array($getResult))
    {   
        if($data['size'] != $size){
            $sqlNew = "INSERT INTO `cart` (`cartid`, `quantity`, `shoeid`, `uname1`,`size`) VALUES (NULL, $quantity, $shoeid, '$username',$size);";
            if (mysqli_query($db, $sqlNew)) {
                header("Location: cart.php");
                break;
            } else {
                echo "Error: " . $sqlNew . "" . mysqli_error($db);
            }
        }
        else
        if($data['shoeid'] == $shoeid && $data['size'] == $size)
        {
            $addition = (int)$data['quantity'] + $quantity;
            $updateSql ="UPDATE `cart` SET `quantity` = $addition WHERE (`cart`.`shoeid` = $shoeid AND cart.uname1 = '$username' AND `cart`.`size` = $size)";
            if(mysqli_query($db, $updateSql)){
                header("Location: cart.php");
                break;
            }else {
                echo "Error: " . $sqlNew . "" . mysqli_error($db);
            }

        }
    }










?>