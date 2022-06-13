<?php 
    use FTP\Connection; 

    include_once("config.php");

    session_start();


    function add_temp_user($nic,$std_name,$email,$faculty,$payment,$tp_no){
        $con = Connection();

        $check_sql = "SELECT * FROM temp_user_tbl WHERE nic_no = '$nic' && email = '$email'";
        $check_sql_result = mysqli_query($con, $check_sql);
        $check_sql_nor = mysqli_num_rows($check_sql_result);


        if($check_sql_nor > 0){
            return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>User Already Exists..!</div>&nbsp</center>"; 
        }        
        else{
            $insert_sql = "INSERT INTO temp_user_tbl(std_name,nic_no,email,faculty,payment,pay_date,tp_no)VALUES('$std_name','$nic','$email','$faculty','$payment',NOW(),'$tp_no')";
            $insert_sql_result = mysqli_query($con, $insert_sql);

           
            $pwd = rand(10000,99999);
            $msg = "Your username : ".$nic."  Your Password is : " .$pwd." Important - Change Your Password After Login to the System";
            
            $mailto = $email;
            $subject = "Verification OTP - Email Sending System";
            $body = $msg;
            $headers = "From:jehankandy@gmail.com";
    
            mail($mailto,$subject,$body,$headers);

            $insert_student = "INSERT INTO user_tbl(id,email,pass,faculty,roll,user_status,enroll_date)VALUES('$nic','$email','$pwd','$faculty','student','1',NOW())";
            $insert_student_result = mysqli_query($con, $insert_student);
            header('location:../../index.php');
        }
    }



?>
