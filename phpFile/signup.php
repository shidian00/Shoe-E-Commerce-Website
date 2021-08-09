<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="../css/login.css">
    <title>Sign up page</title>
</head>

<body>
    <div class="signupbox">
        <img src="../images/loginlogo.png" class="signuplogo">

        <h1>Sign Up Here</h1>
        <form name="myform2" action="handleSignup.php" method="POST">

            <p>Username</p>
            <input type="text" name="uname1" placeholder="Enter Username" required="">

            <div class="gender-details">
                <p>Gender</p>
                <label class="radio">
                    <input type="radio" value="male" name="gender">
                    male
                    <span></span>
                </label>
                <label class="radio">
                    <input type="radio" value="female" name="gender">
                    female
                    <span></span>
                </label>
            </div>

            <p>Email</p>
            <input type="email" name="email" placeholder="Enter email" required="">

            <p>Password</p>
            <input type="password" name="upswd1" placeholder="Enter Password" required="" pattern="(?=.*\d)(?=.*[a-z]).{5,}"  title="Password Requiremend: Atleast 1 number 1 alphabet and total of 5 character">

            <p>Confirm Password</p>
            <input type="password" name="upswd2" placeholder="Enter again your password" required="" pattern="(?=.*\d)(?=.*[a-z]).{5,}">





            <input type="submit" name="" value="Sign Up">

            <br><br>
            <a href="../index.php">Existing user, login !?</a><br>
            <a href="admin.php">Log in as admin</a><br>
            <a href="loginGuest.php">Continue as guest</a><br>
        </form>

    </div>
</body>

</html>