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
<form action="unsubscribe.php" method="POST" autocomplete="on">
    <h1 class="text-center">Code Verification</h1>
    <h3>Dear, Subscriber Enter your detail to Unsubscribe Acount.</h3>
    <div>
        <div class="form-group">
        <label for="name">Full Name:</label>
            <input class="form-control div1" type="text" name="name" placeholder="Enter Full Name" required value="<?php echo $name ?>"><br>
        </div>
        <div class="form-group"><br>
            <label for="email">Email Address :</label> 
            <input class="form-control div1" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
        </div>
        <div class="form-group"><br>
            <input class="form-control button" type="submit" name="unsubscribe" value="Unsubscribe">
    </div>
</form>

