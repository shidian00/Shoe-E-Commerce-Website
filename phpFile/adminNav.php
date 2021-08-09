

<head>    
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.4.2/css/all.css" />
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <nav class="nav">
        <div class="container">
            <h1 class="logo"><a href="adminCreate.php"><img src="../images/footprints.png" alt="footprint" width="50" ,
                        height="50">
                </a></h1>
            <ul>
                <li><a href="adminCreate.php"><i class="fas fa-plus"></i> Add New product</a></li>
                <li><a href="adminDelete"><i class="far fa-trash-alt"></i> Delete product</a></li>
                <li><a href="adminUpdate.php"><i class="far fa-edit"></i></i> Update product</a></li>
            
                <?php
                if(session_id() == '' || !isset($_SESSION)) {
                    session_start();
                }
                echo '<li><a id = "account" ><i class="far fa-user"></i> Login As :'. $_SESSION['username'] .'</a></li>';
                echo '<li><a id = "logOut" href = "logOut.php" ><i class="fas fa-sign-out-alt"></i> LogOut</a></li>';
                ?>
            </ul>
        </div>
    </nav>
    <script src="../js/navScript.js"></script>
</body>

<style>
    #logOut{
        color:tomato;
        cursor:pointer;
    }
    #account{
        cursor:pointer;
    }
</style>