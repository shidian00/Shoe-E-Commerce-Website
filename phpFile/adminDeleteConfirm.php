<?php
include "dbConn.php";

if(isset($_GET['deleteid']))
{
    $delete =  (int)$_GET['deleteid'];
    $sqlDelete = "DELETE FROM `shoe` WHERE `shoe`.`shoeid` =$delete;";

    if(mysqli_query($db,$sqlDelete)){
        echo "Delete SuccessFully";
        header('location:adminDelete.php');
    }else
    {
        echo "Error: " . $sqlDelete . "<br>" . mysqli_error($db);
    }
}
?>