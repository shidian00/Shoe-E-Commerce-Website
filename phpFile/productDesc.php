<?php 
 if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
include "dbConn.php"; 
$shoeid = (int) trim($_GET['shoeid']); 

$sql = "SELECT * FROM `shoe` WHERE shoeid = $shoeid;";


$sth = $db->query($sql);
while($data=mysqli_fetch_array($sth))
{
    $shoeid = $data['shoeid'];
    $shoename = $data['shoename'];
    $shoeprice = $data['shoeprice'];
    $shoedesc = $data['shoedesc'];
    $shoepic = $data['shoepic'];
    $shoepic2 = $data['shoepic2'];
    $shoegender = $data['gender'];
}     

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/productDesc.css">
    <link rel="stylesheet" type="text/css" href="../css/review.css">
    <title><?php echo $shoename ?></title>
    <?php include "navTop.php";?>
    <?php include "scrollToTop.php";?>
</head>


<body>
    <div class="productDesc">

        <div class="gridContainer">

            <div class="slideShow">

                <div class="slides">

                    <input type="radio" name="slide" id="img1">
                    <input type="radio" name="slide" id="img2">

                    <div class="slide s1">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($shoepic).'"/>'; ?>
                    </div>

                    <div class="slide s2">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($shoepic2).'"/>'; ?>
                    </div>
                </div>


                <div class="navigation">
                    <label for="img1"></label>
                    <label for="img2"></label>

                </div>
            </div>
            <div class="addOn">
                <h1><?php echo $shoename ?></h1>
                <h4><?php echo 'RM'. $shoeprice ?></h4>

                <a class = "share" href="" id="fb_share" onclick="facebook()"><i class="fab fa-facebook-square"></i></a>
                <a class = "share" href="" id="whatsapp_share" onclick="whatsapp()"><i class="fab fa-whatsapp-square"></i></a>
                <a class = "share" href="" id="twitter_share" onclick="twitter()"><i class="fab fa-twitter-square"></i></a>





                <?php
                if($_SESSION['username'] == "Guest"){
                    echo '                
                    <form method = "POST" action="">
                    <select name = "size">
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="52">52</option>
                        <option value="54">54</option>
                    </select>
                    <input type="number" value="1" name = "quantity">
                    <button class = "button" onclick = "cartLimitation()">Add <i class="fas fa-shopping-cart"></i></button>
                    </form>';
                }
                else
                {
                    echo '               
                    <form method = "POST" action="insertIntoCart.php?shoeid='.$shoeid.'">
                    <select name = "size">
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="52">52</option>
                        <option value="54">54</option>
                    </select>
                    <input type="number" value="1" name = "quantity">
                    <button class = "button" type = "submit">Add <i class="fas fa-shopping-cart"></i></button>

                    </form>';
                }
                
                ?>
                
                    <div class="desc">
                        <h3>Product description</h3>
                        <br>
                        <p>
                        <?php echo $shoedesc ?>
                        </p>
                    </div>
                    <div>
                        <a href = "deliveryInfo.php">Delivery Policy</a>
                    </div>
            </div>
        </div>

        <?php
                if($_SESSION['username'] == "Guest"){
                    echo '
                    <form id="reviewForm" method="post" action="">
                     <div>
                         <h3 id = reviewHead> Review <i class="far fa-comments"></i> </h3>
                    </div>
                    <div>
                        <textarea id = textArea name = "review" placeholder = "Enter review Here"name="review" form="reviewForm" ></textarea>
                    </div>
                        <input id = submitButton type="submit" name = "submit" class = "button" onclick = "reviewLimitation()">
                </form>
            ';
                }
                else{
                    echo '
                    <form id="reviewForm" method="post" action="reviewUpdate.php?shoeid='.$shoeid.'">
                     <div>
                         <h3 id = reviewHead> Review <i class="far fa-comments"></i> </h3>
                    </div>
                    <div>
                        <textarea id = textArea name = "review" placeholder = "Enter review Here"name="review" form="reviewForm" ></textarea>
                    </div>
                        <input id = submitButton class = "button" type="submit" name = "submit">
                </form>
            ';
                }
                
        ?>
<?php
    
    $sqlReview = "SELECT * FROM review where shoeid ='$shoeid'ORDER BY reviewid DESC;";
    $sth2 = $db->query($sqlReview);

    
    while($reviewData=mysqli_fetch_array($sth2))
    {
        echo '<div class = "commentBlock"><div><i class="far fa-user"></i> '.$reviewData['uname1'].'</div>
        '.$reviewData['review']. '</div>';
    }
    ?>

    </div>
    <script src="../js/share.js"></script>
</body>

</html>


