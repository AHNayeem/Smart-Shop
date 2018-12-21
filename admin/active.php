<?php include_once 'inc/lr_header.php'?>

<?php 

$msgs = [];
$errors = [];

if (empty($_GET) || !isset($_GET['token'])) {
	header('Location: register.php');
}

$token = $_GET['token'];
$query = $connection->prepare("UPDATE `admins` SET `active` = 1 WHERE `activation_token` = :token");
$query->bindValue('token', trim($token));
$query->execute();

if ($query->rowCount() === 1) {
	$msgs[] = 'Your Account is activated.';
	$query = $connection->prepare('UPDATE `admins` SET `activation_token` = NULL WHERE `activation_token` = :token');
	$query->bindValue('token', trim($_GET['token']));
	$query->execute();
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
			<div class="text-center">
				<a href="login.php" class="btn btn-primary btn-block">You can login now</a>
			</div>
        </div>

<?php
include_once 'inc/lr_footer.php' 
?>