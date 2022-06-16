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

    function all_student(){
        $con = Connection();

        $all_student = "SELECT * FROM user_tbl WHERE roll = 'student'";
        $all_student_result = mysqli_query($con, $all_student);
        
        while($row = mysqli_fetch_assoc($all_student_result)){
            $std = "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['fname']."</td>
                    <td>".$row['lname']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['faculty']."</td>
                    <td>".$row['roll']."</td>";
                if($row['user_status'] == 1){
                    $is = "<td><h4><span class='badge badge-success'>Active</span></h4></td>";
                }
                else{
                    $is = "<td><h4><span class='badge badge-danger'>Deactive</span></h4></td>";
                }
            $std1 = "<td><a href='more_infor.php?id=$row[id]'><button class='btn btn-primary'>View Infor</button></a></td>
                    <tr>";
        }
        echo $std.$is.$std1;
    }

    function nav_bar_id(){
        $con = Connection();

        $login_session_id = strval($_SESSION['loginSession']);

        echo $login_session_id;
    }

    function get_std_data(){
        $con = Connection();
        $id = strval($_SESSION['loginSession']);

        $std_data = "SELECT * FROM user_tbl WHERE id = '$id'";
        $std_data_result = mysqli_query($con, $std_data);
        $std_data_row = mysqli_fetch_assoc($std_data_result);

            $data =  "<div class='profile'>
                    <form action='' method='POST'>
                        <table border='1'>
                            <tr>
                                <td><span>Student ID  </span></td>
                                <td><span>".$std_data_row['id']."</span></td>
                            </tr>
                            <tr>
                                <td><span>Email  </span></td>
                                <td><span>".$std_data_row['email']."</span></td>
                            </tr>
                            <tr>
                                <td><span>Full Name  </span></td>
                                <td><span><textarea cols='50' rows='3' class='textarea-input'>".$std_data_row['full_name']."</textarea></span></td>
                            </tr>
                            <tr>
                                <td><span>Name with Initials</span></td>
                                <td><span><span><input type='text'name='new_fullname' value='".$std_data_row['name_with_latters']."' class='update-input'></span></td>
                            </td>
                            <tr>
                                <td><span>First Name</span></td>
                                <td><span><input type='text'name='new_fullname' value='".$std_data_row['fname']."' class='update-input'></span></td>
                            </tr>
                            <tr>
                                <td><span>Last Name</span></td>
                                <td><span><input type='text'name='new_fullname' value='".$std_data_row['lname']."' class='update-input'></span></td>
                            </tr>
                            <tr>
                                <td><span>Address</span></td>
                                <td><span><textarea cols='50' rows='3' class='textarea-input'>".$std_data_row['address']."</textarea></span></td>
                            </tr>
                            <tr>
                                <td><span>Mobile Number</span></td>
                                <td><span><input type='text'name='new_fullname' value='".$std_data_row['tp_no']."' class='update-input'></span></td>
                            </tr>
                            <tr>
                                <td><span>Faculty  </span></td>
                                <td><span>".$std_data_row['faculty']."</span></td>
                            </tr>
                            <tr>
                                <td><span>Roll  </span></td>
                                <td><span>".$std_data_row['roll']."</span></td>
                            </tr>
                            

                            <tr>
                                <td><span>Account Status  </span></td> ";
                            if($std_data_row['user_status'] == 1){
                                $data .="<td><span>Account Active</span></td>";
                            }else{
                                $data .="<td><span>Account Deactive</span></td>";
                            }
                            
                    $data .="</tr>
                            <tr>
                                <td><span>Enroll Date  </span></td>
                                <td><span>".$std_data_row['enroll_date']."</span></td>
                            </tr>
                            
                        </table>
                    </form>
                </div>";

                echo $data;
    }
?>
