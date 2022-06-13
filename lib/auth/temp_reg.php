<?php include_once("../views/header.php"); ?>
<body>
<?php include_once("../views/nav.php"); ?>

<div class="temp-reg-content">
    <div class="content-reg">
        <div class="temp-content-box">
            <div class="temp-title">
                Join As New Student
            </div>
            <?php
                include("../function/function.php");
                if(isset($_POST['pay_join'])){
                    $result = add_temp_user($_POST['nic'],$_POST['std_name'],$_POST['email'],$_POST['faculty'],$_POST['payment'],$_POST['tp_no']);
                    echo ($result);
                }
            ?>
            <hr>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="label">NIC No</div>
                <input type="text" name="nic" id="nic" class="input-login" placeholder="NIC No" required>
                <div class="label">Name</div>
                <input type="text" name="std_name" id="stdname" class="input-login" placeholder="Name" required>
                <div class="label">Email</div>
                <input type="email" name="email" id="email" class="input-login" placeholder="Email" required>
                <div class="label">Select Your Faculty</div>
                <select name="faculty" id="faculty" class="select">
                    <option value="IT">IT</option>
                    <option value="English">English</option>                        
                    <option value="Management">Management</option>
                </select>

                <div class="label">Payment</div>
                <input type="number" name="payment" id="payment" class="input-login" placeholder="Payment" required>
                <div class="label">Mobile Number</div>
                <input type="text" name="tp_no" id="tp_no" class="input-login" placeholder="Mobile Number" required>
                <hr>
                <h4>Payment Details</h4>
                <div class="label">Card Holder</div>
                <input type="text" id="holder" class="input-login" placeholder="Holder Name" required>
                <div class="label">Card Number</div>
                <input type="text" id="holder" class="input-login" placeholder="Card Number" required>
                <div class="label">CVV</div>
                <input type="number" id="holder" class="input-login-cvv" placeholder="CVV" required>
                <div class="label">Expire Date</div>
                <input type="date" id="holder" class="input-login"  required><br><br>
                <input type="submit" value="Pay and Join" name="pay_join" class="pay-btn">
                <input type="reset" value="Clear" class="clear-btn">
            </form>
            <p>After Adding Deatils to System Check your adding Email<br>for username and password</p>
        </div>
    </div>
</div>

<?php include_once("../views/footer1.php")?>
</body>
</html>
