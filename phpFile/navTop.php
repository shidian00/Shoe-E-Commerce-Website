<head>    
<link rel="stylesheet" href="../css/nav.css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.4.2/css/all.css" />

</head>

<body>
    <nav class="nav">
        <div class="container">
            <a href="index.php"><img src="../images/footprints.png" alt="footprint" width="45px" ,height="auto"></a>
            <ul>
                <li><a href="landingPage.php" class="current"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="shop"><i class="fas fa-store"></i> Shop</a></li>
                <li><a href="faq.php"><i class="far fa-question-circle"></i> FAQ</a></li>
                <li><a href="aboutUs.php"><i class="far fa-address-card"></i> About Us</a></li>
                <li><a href="aboutUs.php?/#contact-us"><i class="far fa-address-book"></i> Contact Us</a></li>

               
                <?php
               if(session_id() == '' || !isset($_SESSION)) {
                    session_start();
                }
                if($_SESSION['username'] != "Guest")
                {
                    echo '<li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>';
                }

                if($_SESSION['username'] == "Guest")
                {
                    echo '<script src="../js/guestLimitation.js"></script>';
                }


                echo '<li><a id = "account" ><i class="far fa-user"></i> Login As :'. $_SESSION['username'] .'</a></li>';
                echo '<li><a id = "logOut" href = "logOut.php" ><i class="fas fa-sign-out-alt"></i> LogOut</a></li>';


                ?>
            </ul>
        </div>
    </nav>


<span onclick="openNav()" class="openMenu"> &#9776;</span>
            <div class="sideNav" id="jsideNav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="landingPage.php"><i class="fas fa-home"></i> Home</a>
                <a href="shop.php"><i class="fas fa-store"></i> Shop</a>
                <a href="faq.php"><i class="far fa-question-circle"></i> FAQ</a>
                <a href="aboutUs.php"><i class="far fa-address-card"></i> About Us</a>
                <a href="aboutUs.php?/#contact-us"><i class="far fa-address-book"></i> Contact Us</a>
            </div>
<script src="../js/navScript.js"></script>
</body>


