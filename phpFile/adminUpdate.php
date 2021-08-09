


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update</title>
</head>

<header>

</header>


<body>
    <?php
    session_start();
    $_SESSION['username'] = "Admin";
    
    ?>
    <div class="adminContainer">
        <h1>Update Product Record</h1>
        <table>
            <tr>
                <th>Shoe ID</th>
                <th>Shoe Picture</th>
                <th>Shoe Picture</th>
                <th>Shoe Name</th>
                <th>Price (RM) </th>
                <th>Gender</th>
                <th>Shoe Description</th>


            </tr>
<?php

include "dbConn.php";
include "adminNav.php";
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}


$sql = "SELECT * FROM shoe;";

$result = mysqli_query($db,$sql);

while($data=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo '<td>'.$data['shoeid'].'</td>';
    echo '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['shoepic']).'"/>'.'</td>';
    echo '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['shoepic2']).'"/>'.'</td>';
    echo '<td>'.$data['shoename'].'</td>';
    echo '<td>'.$data['shoeprice'].'</td>';
    echo '<td>'.$data['gender'].'</td>';
    echo '<td>'.$data['shoedesc'].'</td>';
    echo '<td><button><a id = "update" onclick = "confirmation('.$data['shoeid'].')"> Update <i class="far fa-edit"></i></a></button></td>';
    echo "</tr>";

}


?>
    </table>
    </div>


    <script>
        function confirmation(updateNo)
    {
        var del=confirm("Are you sure you want to update this record?\n"+updateNo);
        if (del==true){
            window.location.href="adminUpdateConfirm.php?updateid="+updateNo;
        }
    }
</script>
</body>
</html>