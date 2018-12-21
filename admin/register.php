<?php
include_once 'inc/lr_header.php';
//Load composer's autoloader
    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
?>

<?php 
    //get the data input by user
if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];
    $msgs = [];

    //Validation check
    if (strlen($username) < 6) {
        $errors[] = "Username must be at least 6 characters";
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $errors[] = "Invalid Email Format";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    //if no errors 
    if (empty($errors)) {
        $activation_token = sha1($email.time().$_SERVER['REMOTE_ADDR']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare('INSERT INTO `admins`(`name`,`username`,`email`,`password`,`activation_token`) VALUES(:name, :username, :email, :password, :activation_token)');
        $query->bindValue(':name', $name);
        $query->bindValue('username', strtolower($username));
        $query->bindValue('email', strtolower($email));
        $query->bindValue('password', $password);
        $query->bindValue('activation_token', $activation_token);
        $query->execute();

        $msgs[] = "Registration done successfully! Please check your email to activate account.";
    }

    //Email the user 
    //
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->Debugoutput = 'html';                          // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mailtrap.io';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'f3944ef580f4ce';                   // SMTP username
        $mail->Password = '3f00a64d61a6c6';                   // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 2525;                                   // TCP port to connect to

        //Recipients
        $mail->setFrom('no-reply@professionalsbd.com', 'AhnNayeem');
        $mail->addAddress($email, $username);               // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = 'Email Activation';
        $mail->Body = '<p>Hello ' . $username . '</p>'
                . '<p><a class="btn btn-info" href="http://localhost/smart-shop/admin/active.php?token=' . $activation_token . '">Click to activate</a></p>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $msgs[] = 'Email has been sent';
    } catch (Exception $e) {
        $errors[] = 'Email could not be sent.';
        $errors[] = 'Mailer Error: ' . $mail->ErrorInfo;
    }
    
    //Meassage the user 
}

?>
    <div class="middle-box text-center loginscreen animated fadeInDown" style="width: 400px;">
        <div class="row">
                <div class="col-md-12">
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
            </div>
        <div class="ibox-content">
            <!-- <div>
                 <h1 class="logo-name">AH</h1> 
            </div> -->
            <h3>Register to Smart Shop</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="User Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" name="register" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
        </div>
        <hr>
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

