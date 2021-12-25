<?php require_once "controllerUserData.php"; ?>
<?php 
    if(isset($_SESSION['info'])){ ?>
        <div class="alert alert-success text-center">
            <?php echo $_SESSION['info'];?>
        </div>
        <?php
        }
    ?>
     <?php
        if(count($errors) > 0){
            ?>
            <div class="alert alert-danger text-center">
                <?php
                    foreach($errors as $showerror){
                        echo $showerror;
                    } 
                ?>
            </div>
            <?php
        }
    ?>
<form action="verify.php" method="POST" autocomplete="on">
    <h1 class="text-center">Code Verification</h1>
    <div>
        <h3>Dear, Subscriber Enter your OTP to Activat Acount.</h3>
        <div class="form-group"><br>
            <label for="fname">Enter OTP </label>
            <input class="form-control" type="tel" name="otp" placeholder="Enter verification code" required>
         </div>
        <div class="form-group"><br>
            <input class="form-control button" type="submit" name="check" value="OTP Submit">
        </div>
    </div>
</form>

