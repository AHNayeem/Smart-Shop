<?php 
include_once 'inc/lr_header.php';
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<?php 

if(isset($_POST['forgot_password'])){
   $email = strtolower(trim($_POST['email']));
   $errors = [];
   $msgs = [];

   //Validate the inputs

   if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
        $errors[] = 'Invalid email format!';
    }
    // if no errors than DB upload
    if (empty($errors)) {
        $stmt= $connection->prepare("SELECT `admin_id`, `password`, `username` FROM `admins` WHERE `email` = :email AND `active` = 1");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $admin_info = $stmt->fetch();

        if ($stmt->rowCount() === 1) {
            $reset_token = sha1($email . $admin_info['username'] . time() . $_SERVER['REMOTE_ADDR']);
            $stmt = $connection->prepare("UPDATE `admins` SET `reset_token` = :reset_token WHERE `email` = :email");
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':reset_token', $reset_token);
            $stmt->execute();

            //MAILING THE USER
            $mail = new PHPMailer(true);
            // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->Debugoutput = 'html';  // Enable verbose debug output
                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = 'smtp.mailtrap.io';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                $mail->Username = 'f3944ef580f4ce';                     // SMTP username
                $mail->Password = '3f00a64d61a6c6';                     // SMTP password
                $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 2525;                                     // TCP port to connect to
                //Recipients
                $mail->setFrom('no-reply@gmail.com', 'Max');
                $mail->addAddress($email, $admin_info['username']);     // Add a recipient
                //Content
                $mail->isHTML();                                        // Set email format to HTML
                $mail->Subject = 'RESET password Link';

                $mail->Body = '<p>Hello ' . $admin_info['username'] . '</p>'
                        . '<p><a href="http://localhost/smart-shop/admin/reset_password.php?token=' . $reset_token . '">Reset your Password</a></p>';

                $mail->send();
                $msgs[] = 'Email has been sent. Please reset from your email account.';
            } catch (Exception $e) {
                $errors[] = 'Email could not be sent.';
                $errors[] = 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }$errors[] = "No user found with this email.";
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
                    <h2 class="font-bold">Forgot password</h2>
                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                                </div>
                                <button type="submit" name="forgot_password" class="btn btn-primary block full-width m-b">Send new password</button>
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
