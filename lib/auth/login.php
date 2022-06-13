<?php include_once("../views/header.php"); ?>
<body>
<?php include_once("../views/login_nav.php"); ?>

<div class="login">
    <div class="login-content">
        <div class="login-box">
            <div class="login-title">
                Login Here
            </div>
            <hr>

            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-label">Username : </div>
                <input type="text" name="username" id="username" class="login-input" placeholder="Username">

                <div class="login-label">Password : </div>
                <input type="password" name="password" id="password" class="login-input" placeholder="Password">
                <br><br>
                <input type="submit" value="Login" class="login-btn" name="login">
            </form>
        </div>
    </div>
</div>



<?php include_once("../views/footer1.php"); ?>
</body>
</html>
