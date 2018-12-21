<?php 
include_once 'inc/lr_header.php';
?>
<?php 

if (empty($_GET) || !isset($_GET['token'])) {
    header('Location: login.php');
} else {
    $query = $connection->prepare("SELECT * FROM `admins` WHERE `reset_token` = :reset_token");
    $query->bindValue(':reset_token', $_GET['token'], PDO::PARAM_INT);
    $query->execute();
    $admin_data = $query->fetch();

    if ($query->rowCount() === 0) {
        header('Location: login.php');
    }
}

if(isset($_POST['reset'])){
   $password = trim($_POST['password']);
   $errors = [];
   $msgs = [];

   //Validate the inputs
   if ($password < 6) {
       $errors[] = 'Password must be at least 6 characters';
   }
    // if no errors than DB upload
    
    $stmt = $connection->prepare("UPDATE `admins` SET `password` = :password WHERE `reset_token` = :reset_token");
    $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $stmt->bindValue(':reset_token', $_GET['token'], PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() === 1) {
        $msgs[] = 'Password Updated Successfully !';

    }
}

?>
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                <?php if (!empty($errors)) { ?>
                    <div style="margin-top: 10px;border-radius: 1px" class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php foreach ($errors as $error) { ?>
                            <p><?php echo $error ?></p>  
                        <?php } ?>
                    </div>   
                    <?php } ?>
                <?php if (!empty($msgs)) { ?>
                    <div style="margin-top: 10px;border-radius: 1px" class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php foreach ($msgs as $msg) { ?>
                            <p><?php echo $msg ?></p>  
                        <?php } ?>
                    </div>   
                <?php } ?>
            </div>
                <div class="ibox-content">
                    <h2 class="font-bold">Enter New Password</h2>
                    <p>
                        <!-- Enter password  -->
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="" method="post">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="New password" required="">
                                </div>
                                <button type="submit" name="reset" class="btn btn-primary block full-width m-b">Reset password</button>
                                <a href="login.php" class="btn btn-primary block full-width m-b">Back to Login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6" style="color: #ddd;">
                <p>&copy; 2017 . All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right">
               <small style="color: #ddd;">Desgined By - <span class="text-info">A.H Nayeem</span></small>
            </div>
        </div>
    </div>

<?php include_once 'inc/lr_footer.php' ?>