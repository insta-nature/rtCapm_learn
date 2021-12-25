<?php require_once "controllerUserData.php"; ?>
<?php 
// $email = $_SESSION['email'];
// $key = $_SESSION['key'];
// if($email != false && $key != false){
//     $sql = "SELECT * FROM usertable WHERE email = '$email'";
//     $run_Sql = mysqli_query($con, $sql);
//     if($run_Sql){
//         $fetch_info = mysqli_fetch_assoc($run_Sql);
//         $status = $fetch_info['status'];
//         $code = $fetch_info['code'];
//         if($status == "subscribe"){
//             if($code != 0){
//                 header('Location: reset-code.php');
//             }
//         }else{
//             header('Location: user-otp.php');
//         }
//     }
// }else{
    // header('Location: home.php');
// }
// Url Encrypt Code..
// $code =  "SELECT * FROM usertable WHERE code";
$sql =  "SELECT * FROM usertable WHERE code = '$email'";
$run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    echo $code;
$encrypt1 = (($code*4345321425*45285)/984558);

$link = "index.php?key=".urlencode(base64_encode($encrypt1));

foreach($_GET as $key => $code) {
    $endata = $_GET[$key] = base64_decode(urldecode($code));
    $encrypt2 = ((($endata*984558)/45285)/4345321425);
    
    echo $sql;
    echo $code;
    echo $encrypt2;
    if($code == $encrypt2){
        echo "Flase";
    }else{
        echo "True";
    }

}
}
?>
<form action="index.php" method="POST" autocomplete="on">
    <!-- <h5 class="text-center">Code Verification</h5> -->
    <h2>Dear, Subscriber Enter your detail to Activat Acount.</h2>
    <div>
        <div class="form-group">
            <!-- <input class="form-control" type="tel" name="otp" placeholder="Enter verification code" required> -->
        </div>
        <div class="form-group">
            <input class="form-control button" type="Submit" name="check" value="Subscribe Now">
            <!-- <button type="Submit" name="check" value="">Subscribe Now</button> -->
        </div>
    </div>
</form>

