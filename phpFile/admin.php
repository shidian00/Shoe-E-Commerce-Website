<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/login.css">
    <title>Admin login page</title>
</head>

<body>
    <div class="loginbox">

        <img src="../images/loginlogo.png" class="loginlogo">

        <h1>Admin Login</h1>
        <form name="myform2" action="handleAdmin.php" method="POST">

            <p>Admin name</p>
            <input type="text" name="adminname" placeholder="Enter admin name" required="">

            <p>Password</p>
            <input type="password" name="pswd" placeholder="Enter Password" required="">


            <input type="submit" value="Login" name="">
            <a href="signup.php">Don't have an account?</a><br>
            <a href="../index.php">Login as user</a><br>
            <a href="loginGuest.php">Continue as guest</a>
        </form>

    </div>
</body>

</html>