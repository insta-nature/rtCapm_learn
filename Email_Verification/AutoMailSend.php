<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'userform');
$status = "subscribe";
 
class AutoSendingMail{
    function SendMail($rec,$img){
        // Sending email
        // $to="fmc202158@zealeducation.com";
        // print_r($rec);
        $email=$rec;
        $subject="XKCD";
        $message="This is Image<br><img src=".$img.">";
        $sender = "From: ethan.service.v3@gmail.com\r\n";
        $sender .= "MIME-Version: 1.0"."\r\n";
        $sender .="Content-type:text/html;charset=UTF-8"."\r\n";
        //mail($to,$subject,$message,$sender);
        if(mail($email, $subject, $message, $sender)){
            $info = "sent a verification link in your email - $email";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            // header('location: verify.php');
            // exit();
            }else{
                $errors['email'] = "Failed while sending code!";
            }
    }
}
// $email = $name = "";


$sql = "SELECT email, name,status FROM usertable WHERE status = '$status'";
$res = mysqli_query($con,$sql);
$AutoMailSend =new AutoSendingMail();
// Set Array
$array = array();


$randval = rand(1,614);
$url = "https://xkcd.com/$randval/info.0.json";

    //  Initiate curl
$curl = curl_init($url);
    // Will return the response, if false it print the response
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the url
curl_setopt($curl, CURLOPT_URL, $url);
    // Execute
$img = curl_exec($curl);
    // Closing....
curl_close($curl);

while($row = mysqli_fetch_assoc($res)){
    // add valid email row..
    $array[] = $row['email'];

    
}
// Display Array.
print_r($array);
// foreach($array as $val){
//     // echo "$val <br>";
//     $AutoMailSend ->SendMail($val,$img);

// }

$y = sizeof($array);

foreach($array as $x){ 
    // $val = $array[$x];
    // print_r($x);
    $AutoMailSend ->SendMail($x,$img);
}


// =========================================================================
// while($row = mysqli_fetch_assoc($email)){

//     // add each row returned into an array
//     $array[] = $row;
//     print_r($array);
//     $email = $row['email'];
//     $name = $row['name'];
//     $randval = rand(0,614);
//     $url = "https://xkcd.com/$randval/info.0.json";

//     //  Initiate curl
//     $curl = curl_init();
//     // Will return the response, if false it print the response
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     // Set the url
//     curl_setopt($curl, CURLOPT_URL, $url);
//     // Execute
//     $img = curl_exec($curl);
//     // Closing....
//     curl_close($curl);

//     // set array
//     $array = array();
 
    // $jsondata = json_decode($img);
    // $image = $jsondata->img;
    // echo $image;

    // if($email and $status and $name){
    //     // foreach($jsondata as $key => $value){
    //     //     $image = $jsondata[$key]["img"];
    //     $subject = "Email Verification Code";
    //         // $message = "Your verification code is $code"; 
    //     $message ="<h3>Add Comics and Unsubscribe link.</h3><img src='$image'>";
    //     $sender ="MIME-Version: 1.0"."\r\n";
    //     $sender .="Content-type:text/html;charset=UTF-8"."\r\n ";
    //     $sender .= "From: ethan.service.v3@gmail.com";
    //     if(mail($email, $subject, $message, $sender)){
    //         $info = "sent a verification link in your email - $email";
    //         $_SESSION['info'] = $info;
    //         $_SESSION['email'] = $email;
    //         // header('location: verify.php');
    //         exit();
    //     }else{
    //         $errors['email'] = "Failed while sending code!";
    //     }
    // }else{
    //     $errors['email'] = "Failed while inserting data..!";
    // }
// }
// else{
// }

?>