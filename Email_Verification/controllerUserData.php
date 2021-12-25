<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'userform');
$email = "";
$name = "";
$key = "";
$errors = array();

//if user send_mail button
if(isset($_POST['send_mail'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    // $key = $name;
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $email_check = "SELECT email FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){ 
        $code = rand(999999, 111111);
        $status = "unsubscribe";

        if($email and $code and $name){
            $subject = "Email Verification Code";
            // $message = "Your verification code is $code";
            $message ="<h3>Please verify your email address to complete your action.</h3><br> 
                    <h3>$code</h3> </a>";
            $sender ="MIME-Version: 1.0"."\r\n";
            $sender .="Content-type:text/html;charset=UTF-8"."\r\n ";
            $sender .= "From: ethan.service.v3@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "sent a verification link in your email - $email";
                $insert_data = "INSERT INTO usertable (name, email, code, status)
                                values('$name', '$email', '$code', '$status')";
                $data_check = mysqli_query($con, $insert_data);
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: verify.php');
                exit();
            }else{
                $errors['email'] = "Failed while sending code!";
            }
        }
        else{
            $errors['email'] = "Failed while inserting data..!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT code FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'subscribe';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: index.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
            
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
    if(isset($_POST['unsubscribe'])){
        $_SESSION['info'] = "";
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $status = "unsubscribe";
        // $con = mysqli_connect('localhost', 'root', '', 'userform');
        $sql = "UPDATE usertable SET status = '$status' WHERE email= '$email'";

        $res = mysqli_query($con, $sql);
        if($res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            echo "ok";
        }else{
            echo"nan";
        }
    }

    // "INSERT INTO `usertableu` SELECT * FROM `usertable` WHERE code=0 and status='unsubscribe';"