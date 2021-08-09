<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <title>All Product</title>
    <?php include "navTop.php"; ?>
    <?php include "navFilter.php";?>
    <?php include "scrollToTop.php";?>
</head>
<body>

<div class="productList">
        <h1>Product</h1>

        <div class="container">

            <?php
                include "dbConn.php"; // Using database connection file here
                $sql = "SELECT * FROM shoe";
                $sth = $db->query($sql);
                while($data=mysqli_fetch_array($sth))
                {
                    if($data['gender'] == 'm')
                        echo '<div class="man card">';
                            else
                                if($data['gender'] == 'w')
                                    echo '<div class="woman card">';
                                        else
                                            echo '<div class="kid card">';



                        

                 echo '<div class="title">'.$data['shoename'].'</div>';
                 echo '<div class="image">
                 <a href = "productDesc.php?shoeid='.   $data['shoeid']     .'"><img src="data:image/jpeg;base64,'.base64_encode( $data['shoepic'] ).'"/></a>
                </div>';

                 echo '<div class="text">'.'RM'.$data['shoeprice'].'</div>';


                 if($_SESSION['username'] == "Guest"){
                    echo '
                 
                    <a href = "#" onclick="cartLimitation()">
                    <button class="button">
                    <i class="fas fa-shopping-cart">
                    </i><span>Add to Cart</span>
                    </button></a>';

                 }else
                 {
                    echo '
                    <a href = "insertIntoCart.php?shoeid='.   $data['shoeid']     .'">
                    <button class="button">
                    <i class="fas fa-shopping-cart">
                    </i><span>Add to Cart</span>
                    </button></a>';
                 }

           

                 echo '</div>';

                }
            ?>
    </div>
</div>
    <script src="../js/filterScript.js"></script>
</body>



<style>

    
</style>
</html>