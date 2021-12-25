<?php 
$status = "subscribe";
$con = mysqli_connect('localhost', 'root', '', 'userform');
$email = "";
$sql = "SELECT email FROM usertable WHERE status = '$status'";
$res = mysqli_query($con,$sql);
$recipients = array();
while($row = mysqli_fetch_array($res)) {
    echo $mailArray = $recipients[] = $row['email'],"<br>";

    $subject = "Email Verification Code";
    // $message = "Your verification code is $code"; 
    $message ="<h3>Add Comics and Unsubscribe link Array test.<h3>";
    $sender ="MIME-Version: 1.0"."\r\n";
    $sender .="Content-type:text/html;charset=UTF-8"."\r\n ";
    $sender .= "From: ethan.service.v3@gmail.com";
    if(mail($email, $subject, $message, $sender)){
        $info = "sent a verification link in your email - $mailArray";
        $_SESSION['info'] = $info;
        $_SESSION['email'] = $email;
    }
}
// $to = 'info@mydomain.com';
// $subject = "E-mail subject";
// $body = "E-mail body";
// $headers = 'From: info@mydomain.com' . "\r\n" ;
// $headers .= 'Reply-To: info@mydomain.com' . "\r\n";
// $headers .= 'BCC: ' . implode(', ', $recipients) . "\r\n";

// mail($to, $subject, $body, $headers);
?>