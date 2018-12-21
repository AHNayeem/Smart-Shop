<?php require "inc/header.php"; ?>
            

<?php  

if (isset($_POST['customer_login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];
    $msgs = [];

    // check Validation
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = "Invalid Email Format";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    // if no errors 
    
    $query = $connection->prepare("SELECT `customer_id`,`customer_name`,`password` FROM `customers` WHERE `email` = :email");
    $query->bindValue(':email', $email);
    $query->execute();
    $data = $query->fetch();

    if ($query->rowCount() == 1 && password_verify($password, $data['password'])) {
        $_SESSION['customer_id'] = $data['customer_id'];
        $_SESSION['customer_name'] = $data['customer_name'];
        $_SESSION['customer_email'] = $email;
        echo "<script>alert('Login Successfull !!');</script>";
        echo "<script>window.open('profile.php', '_self');</script>";
    }else{
    $errors[] = "Invalid Username or Password";
    }
}

?>

            <!-- Section start -->
                <section>
                    <div class="block color-scheme-3">
                        <div class="container">
                            <div class="header-1">
                                <h1>Login or create new account</h1>
                                <div class="header-bottom-line"></div>
                            </div>
                            <div class="row">
                                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="block-form box-border">
                                        <h3>Login</h3>
                                        <p>Please login using your existing account</p>
                                        <div>
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
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="email" name="email" class="form-control" placeholder="E-Mail">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="submit" name="customer_login" value="Login" class="btn-default-1">
                                                    <input type="reset" value="Reset password" class="btn-default-1">
                                                </div>
                                            </div>                                    
                                        </form>
                                    </div>
                                </article>
                                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="block-form box-border">
                                        <h3>Create new account</h3>
                                        <p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website.</p>
                                        <hr>
                                        <a href="register.php" class="btn-default-1">Register</a>
                                    </div>
                                    <div class="block-form box-border">
                                        <h3>Checkout as Guest</h3>
                                        <p>Checkout as a guest instead!</p>
                                        <hr>
                                        <a href="#" class="btn-default-1">As Guest</a>
                                    </div>

                                </article>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- Section End -->

<?php require "inc/footer.php"; ?>