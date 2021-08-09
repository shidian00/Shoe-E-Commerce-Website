<?php
session_start();
include "dbConn.php";
$username = $_SESSION['username'];

$sql = "SELECT s.shoeid, c.cartid,c.quantity,c.size FROM shoe s INNER JOiN cart c where (c.shoeid = s.shoeid AND c.uname1 = '$username');";

// $sql = "SELECT * from cart";
$result = mysqli_query($db,$sql);

while($data=mysqli_fetch_array($result))
{

    $shoedata[] = $data['shoeid'];
    $cartid[] = $data['cartid'];
    $shoequantity[] = $data['quantity'];
    $shoesize [] = $data['size'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Cart</title>
    <?php include "navTop.php";?>
    <?php include "scrollToTop.php";?>

</head>


<body>

    <div class="cartContainer">
        <table>
            <tr>
                <th>Shoe name</th>
                <th>Shoe Picture</th>
                <th>Price (RM) </th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Total Price (RM)</th>

            </tr>
<?php

if(!isset($shoedata))
{
    echo "There is no items in the cart !!!!!!!!!";
}
else
for($x = 0; $x < count($shoedata); $x++)
{
    $sql2 ="SELECT * FROM shoe WHERE shoeid = $shoedata[$x];";
    $result2 = mysqli_query($db,$sql2);

    echo '<tr>';
    while($data2=mysqli_fetch_array($result2))
    {
        $shoeid = $data2['shoeid'];
        $shoename = $data2['shoename'];
        $shoepic = $data2['shoepic'];
        $shoeprice = $data2['shoeprice'];


        echo '<td><a href = "productDesc.php?shoeid='.$shoeid.'">'.$shoename.'</a></td>';
        echo '<td>'.'<a href = "productDesc.php?shoeid='.$shoeid.'"><img src="data:image/jpeg;base64,'.base64_encode($shoepic).'"/></a>'.'</td>';
        echo '<td>'.$shoeprice.'</td>';

    }
    echo '<td>'.$shoesize[$x].'</td>';
    echo '<td>'.$shoequantity[$x].'</td>';
    echo '<td>'. ($shoeprice * (int)$shoequantity[$x]).'</td>';

    echo '<td> <a href = "deleteFromCart.php?deleteid='.   $cartid[$x] .'">
            <button class="remove"> Delete <i class="far fa-trash-alt"></i>
            </button>
                </a>
    
    
         </td>';
    echo '</tr>';
}
?>
        </table>
        <div>
            <button class="payment" value="1">Payment</button>   
        </div>
    </div>




<script src = "../js/navScript.js"></script>

</body>

</html>