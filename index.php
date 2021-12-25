<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verifiction</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: #0f294e;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="index.php" method="POST" autocomplete="">
                    <p class="text-center">It's quick and easy.</p>
                    <!-- Show Masg Satuts -->
                    <?php 
                        if(isset($_SESSION['info'])){
                        ?>
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
                    <!-- Add Information. -->
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input class="form-control div1" type="text" name="name" placeholder="Fist Name" required value="<?php echo $name ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address :</label><br>
                        <input class="form-control div1" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="send_mail" value="Send Email">
                    </div>
                </form>

                <!-- <form action="home.php" method="POST" autocomplete=""> 
                    <h5 class="text-center">Code Verification</h5>
                    
                         <div>
                    <div class="form-group">
                        <input class="form-control" type="tel" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                    </div>
                </form> -->
            </div>
        </div>
    </div>
</body>
</html>