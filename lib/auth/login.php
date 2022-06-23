<?php include_once("../views/header.php"); ?>
<body>
<?php include_once("../views/login_nav.php"); ?>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<div class="login">
    <div class="login-content">
        <div class="login-box">
            <div class="login-title">
                Login Here
            </div>
            <hr>

            <?php 
                include_once("../function/function.php");
                if(isset($_POST['login'])){
                    $result = login($_POST['username'], md5($_POST['password']));
                    echo ($result);
                }            
            ?>


            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-label">Username : </div>
                <input type="text" name="username" id="username" class="login-input" placeholder="Username">

                <div class="login-label">Password : </div>
                <input type="password" name="password" id="pass" class="login-input" placeholder="Password">
                <span class="eye" onclick="hide_pass()">
                    <i id="hide1" class='far fa-eye'></i>
                    <i id="hide2" class='far fa-eye-slash'></i>
                </span>
                <br><br>
                <input type="submit" value="Login" class="login-btn" name="login">
            </form>
        </div>
    </div>
</div>



<?php include_once("../views/footer1.php"); ?>
<script src="../../js/script.js"></script>

</body>
</html>
