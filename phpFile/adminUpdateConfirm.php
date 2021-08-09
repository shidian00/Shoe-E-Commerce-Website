


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update</title>
</head>

<body>


<div class = "adminContainer" style = "margin-top:100px"> 


<?php
include "adminNav.php";
include "dbConn.php";


if(isset($_GET['updateid']))
{
    $update =  (int)$_GET['updateid'];
    $sqlGet = "SELECT * FROM `shoe` WHERE `shoe`.`shoeid` =$update;";

    $sth = mysqli_query($db,$sqlGet);

    while($data = mysqli_fetch_array($sth))
    {
        $shoeid = $data['shoeid'];
        $shoepic = $data['shoepic'];
        $shoepic2 = $data['shoepic'];
        $shoename = $data['shoename'];
        $shoeprice = $data['shoeprice'];
        $gender =  $data['gender'];
        $shoedesc =  $data['shoedesc'];

        echo "<h1>Product Details</h1>";
        echo "<table>
        <tr>
            <th>Shoe ID</th>
            <th>Shoe Picture</th>
            <th>Shoe Picture</th>
            <th>Shoe Name</th>
            <th>Price (RM) </th>
            <th>Gender</th>
            <th>Shoe Description</th>
        </tr>
        
        <tr>";
        echo '<td>'.$data['shoeid'].'</td>';
        echo '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['shoepic']).'"/>'.'</td>';
        echo '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['shoepic2']).'"/>'.'</td>';
        echo '<td>'.$data['shoename'].'</td>';
        echo '<td>'.$data['shoeprice'].'</td>';
        echo '<td>'.$data['gender'].'</td>';
        echo '<td>'.$data['shoedesc'].'</td>';
        echo "</tr></table>";
    }
}


?>
    <h1>Perform Update </h1>
    <form action="" method="POST" enctype="multipart/form-data">


    <input name="shoeid" id="shoeid" type = "hidden" value = "<?php echo $shoeid ?>"></input>

    <label for="image">Image1</label>
    <br>
    <input name="image" id="image" type = "file"></input>
    <br>

    <label for="image2">Image2</label>
    <br>
    <input name="image2" id="image2" type = "file"></input>
    <br>

    <label for="shoename">Shoe name</label>
    <br>
    <input type="text" name = "shoename" id = "shoename"value = "<?php echo $shoename?>">
    <br>

    <label for="shoeprice">Shoe Price</label>
    <br>
    <input type="text" name = "shoeprice" id = "shoeprice" value = "<?php echo $shoeprice?>">
    <br>
    
    <label for="gender">Man</label>
    <input type="radio" value="m" name="gender" checked="checked">

    <label for="gender">Woman</label>
    <input type="radio" value="w" name="gender">

    <label for="gender">Kid</label>
    <input type="radio" value="k" name="gender">

    <br>
    <label for="shoedesc">Shoe Descriptions</label>
    <br>
    <textarea name="shoedesc" id = "shodesc" cols = "100" rows = "10"  style = "resize:none;" ><?php echo $shoedesc?></textarea>
    <!-- <input type="text" name = "shoedesc" id = "shoedesc"> -->
    <br>

    <input type="submit" name="submit" id="submit" value = "submit">
  
    </form>
    
</div>

</body>
<?php

if(isset($_POST['submit']))
{
    $shoeid = $_POST['shoeid'];
    $shoename = $_POST['shoename'];
    $shoeprice = $_POST['shoeprice'];
    $gender = $_POST['gender'];
    $shoedesc = $_POST['shoedesc'];

if(isset($_POST['shoename']))
{
    $sql = "UPDATE `shoe` SET `shoename` = '$shoename' WHERE `shoe`.`shoeid` = $shoeid";
    mysqli_query($db, $sql);

}

if(isset($_POST['shoeprice']))
{
    $sql = "UPDATE `shoe` SET `shoeprice` = '$shoeprice' WHERE `shoe`.`shoeid` = $shoeid";
    mysqli_query($db, $sql);
}


if(isset($_POST['shoedesc']))
{
    $sql = "UPDATE `shoe` SET `shoedesc` = '$shoedesc' WHERE `shoe`.`shoeid` = $shoeid";
    mysqli_query($db, $sql);
}

if(isset($_POST['gender']))
{
    $sql = "UPDATE `shoe` SET `gender` = '$gender' WHERE `shoe`.`shoeid` = $shoeid";
    mysqli_query($db, $sql);
}

if(is_uploaded_file($_FILES['image']['tmp_name']))
{
    $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $sql = "UPDATE `shoe` SET `shoepic` = '$file' WHERE `shoe`.`shoeid` = $shoeid";
    mysqli_query($db, $sql);

}

if(is_uploaded_file($_FILES['image2']['tmp_name']))
{
    $file2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
    $sql = "UPDATE `shoe` SET `shoepic2` = '$file2' WHERE `shoe`.`shoeid` = $shoeid";
    mysqli_query($db, $sql);
}

echo "<script type='text/javascript'>window.location.href = 'adminUpdateConfirm.php?updateid=$shoeid';</script>";

}

?>
</html>