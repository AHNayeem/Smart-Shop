<?php 
include_once 'inc/lr_header.php';
session_start();
?>

    <?php 
        
    if(isset($_POST['login'])){
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $errors = [];
        $msgs = [];
        
        
        //validation
    if (strlen($username) < 6) {
        $errors[] = "Username must be at least 6 characters";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    
        //if no errors 
    if(empty($errors)){
        $query = $connection->prepare('SELECT admin_id,name,email,password,active FROM `admins` WHERE `username` = :username');
        $query->bindValue('username', strtolower($username));
        $query->execute();
        $data = $query->fetch();
        
        if($query->rowCount() == 1 && password_verify($password, $data['password']) && $data['active'] == 1){
            $_SESSION['id'] = $data['admin_id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['username'] = $username;
            header('location: index.php?page=dashboard');
        }
        $errors[] = 'Invalid Username or Password';
    }
    }
    
    ?>

    <div class="loginColumns ">
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
        <div class="row">

            <div class="col-md-6 animated fadeInLeft">
                <h2 class="font-bold" style="color: #fff;">Welcome to Admin Panel</h2>

                <p class="text-justify" style="color: #eee;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <p class="text-justify" style="color: #eee;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
                <p class="text-justify" style="color: #eee;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

            </div>
            <div class="col-md-6 animated fadeInRight">
                <div class="ibox-content">
                    <h3 class="text-center">Login to Smart Shop</h3>
                    <form class="m-t" role="form" action="" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox i-checks form-group col-md-6">
                            <label for="checkbox" class="control-label">
                            <input type="checkbox" name=""><span> Remember Me</span>
                            </label>
                        </div>
                        <div class="col-md-6 cssanimation leFadeInRight sequence" style="margin-top: 10px; margin-bottom: 10px;">
                        <a href="forgot_password.php" class="pull-right">
                            <small style="text-success">Forgot password?</small>
                        </a>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary block full-width m-b">Login</button>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
                    </form>
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
