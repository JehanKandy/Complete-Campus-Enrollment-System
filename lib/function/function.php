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
            $new_pwd = md5($pwd);

            $mailto = $email;
            $subject = "Verification OTP - Email Sending System";
            $body = $msg;
            $headers = "From:jehankandy@gmail.com";
    
            mail($mailto,$subject,$body,$headers);

            $insert_student = "INSERT INTO user_tbl(id,email,pass,faculty,roll,user_status,enroll_date)VALUES('$nic','$email','$new_pwd','$faculty','student','1',NOW())";
            $insert_student_result = mysqli_query($con, $insert_student);
            header('location:../../index.php');
        }
    }

    function login($username, $pwd){
        $con = Connection();

        $select_sql = "SELECT * FROM user_tbl WHERE id = '$username' && pass = '$pwd'";
        $select_sql_result = mysqli_query($con, $select_sql);
        $select_sql_nor = mysqli_num_rows($select_sql_result);
        $select_sql_row = mysqli_fetch_assoc($select_sql_result);

        if($select_sql_nor > 0){
            if($pwd != $select_sql_row['pass']){
                return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Password doesn't match...!</div>&nbsp</center>"; 
            }
            else{
                if($select_sql_row['user_status'] == 1){
                    if($select_sql_row['roll'] == 'student'){
                        setcookie('login',$select_sql_row['id'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $select_sql_row['id'];
                        header('location:../files/student.php');
                    }
                    elseif($select_sql_row['roll'] == 'teacher'){
                        setcookie('login',$select_sql_row['id'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $select_sql_row['id'];
                        header('location:../files/teacher.php');
                    }
                    elseif($select_sql_row['roll'] == 'admin'){
                        setcookie('login',$select_sql_row['id'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $select_sql_row['id'];
                        header('location:../files/admin.php');
                    }
                    elseif($select_sql_row['roll'] == 'staff'){
                        setcookie('login',$select_sql_row['id'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $select_sql_row['id'];
                        header('location:../files/staff.php');
                    }
                }else{
                    return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Account Deactivated..!</div>&nbsp</center>";
                }
            }
        }else{
            return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Recodes Not Found...!</div>&nbsp</center>";
        }
        
    }



?>
