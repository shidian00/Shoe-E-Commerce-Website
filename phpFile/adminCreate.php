<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Create</title>
</head>

<body>

<?php

include "dbConn.php";
include "adminNav.php";
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
?>
<div class = "adminContainer" style = "margin-top:100px">



<h1>Create Product Record </h1>
    <form action="" method="POST" enctype="multipart/form-data">


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
    <input type="text" name = "shoename" id = "shoename">
    <br>

    <label for="shoeprice">Shoe Price</label>
    <br>
    <input type="text" name = "shoeprice" id = "shoeprice">
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
    <textarea name="shoedesc" id = "shodesc" cols = "100" rows = "10"  style = "resize:none;" ></textarea>
    <!-- <input type="text" name = "shoedesc" id = "shoedesc"> -->
    <br>

    <input type="submit" name="submit" id="submit" value = "submit">
  
    </form>



    
</div>
</body>
<?php

if(isset($_POST['shoename'])&&isset($_POST['shoeprice'])&&isset($_POST['gender'])&&isset($_POST['shoedesc']))
{
    $shoename = $_POST['shoename'];
    $shoeprice = $_POST['shoeprice'];
    $gender = $_POST['gender'];
    $shoedesc = $_POST['shoedesc'];


    if (is_uploaded_file($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image2']['tmp_name']) ) 
    {
    
          $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
          $file2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));



            $sqlInsert = "INSERT INTO `shoe` (`shoeid`,`shoepic`,`shoepic2`, `shoename`, `shoeprice`, `gender`, `shoedesc`) VALUES (NULL,'$file','$file2', '$shoename', '$shoeprice', '$gender', '$shoedesc');";


              if(mysqli_query($db, $sqlInsert)){
                echo '<script type="text/JavaScript"> 
                alert("Create new Record successfully !!!");
                window.location.href="adminCreate.php";
                </script>';                }
                else
                {
                    echo '<script type="text/JavaScript"> 
                    alert("Create Fail please check your input");
                    window.location.href="adminCreate.php";
                    </script>';
                }
                    
    }
}


?>

</html>