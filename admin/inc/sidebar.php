<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['name']; ?></strong>
                     </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="index.php?page=profile">Profile</a></li>
                        <li><a href="contacts.php">Contacts</a></li>
                        <li><a href="mailbox.php">Mailbox</a></li>
                        <li><a href="#change_pass" data-toggle="modal">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Logout</a></li>
                    </ul>
                    <!-- Modal start Here -->
                    <div class="modal inmodal animated slideInRight" id="change_pass" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn btn-danger btn-circle btn-outline pull-right btn-xs" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title"> Change Password</h4>
                                </div>

                                <?php 
                                    if (isset($_POST['change_pass'])) {
                                        $old_password = $_POST['old_password'];
                                        $new_password = $_POST['new_password'];
                                        $errors = [];
                                        $msgs = [];

                                        //validation check
                                        if (strlen($old_password) < 6 || strlen($new_password) < 6) {
                                            $errors[] = 'Password must be at least 6 characters.';
                                        }

                                        //if no errors 
                                        if (empty($errors)) {
                                            $query = $connection->prepare("SELECT admin_id,email,password FROM `admins` WHERE `username` = :username");
                                            $query->bindValue(':username', $_SESSION['username']);
                                            $query->execute();
                                            $admin_data = $query->fetch();

                                            if (password_verify($old_password, $admin_data['password'])) {
                                                $pass_query = $connection->prepare("UPDATE `admins` SET `password` = :password WHERE `username` = :username");
                                                $pass_query->bindValue('username', $_SESSION['username']);
                                                $pass_query->bindValue(':password', password_hash($new_password, PASSWORD_BCRYPT));
                                                $pass_query->execute();

                                                $msgs[] = 'Password Updated Successfully!';
                                            }else {
                                                $errors[] = 'Invalid Old password';
                                            }
                                        }
                                        session_destroy();
                                        header('location: login.php');
                                    }
                                ?>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="row">
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
                                        <div  class="col-md-12">
                                            <div class="form-group">
                                                <label for="old_password" class=" control-label">Old Password</label>
                                                <div class="">
                                                    <input type="password" name="old_password" placeholder="Old Password" id="old_password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password" class=" control-label">New Password</label>
                                                <div class="">
                                                    <input type="password" name="new_password" placeholder="New Password" id="new_password" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Close</button>
                                    <button type="submit" name="change_pass" class="btn btn-primary btn-xs">Change Password</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- Modal close -->
                </div>
                <div class="logo-element">
                    AHN
                </div>
            </li>
            <!-- Dashboard Menu -->
            <li>
                <a href="">
                    <i class="fa fa-tachometer"></i> <span class="nav-label">Dashboard</span>
                     <span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li class=""><a href="index.php?page=dashboard">Home</a></li>
                     </ul>
            </li>
            <!-- CATEGORY pages -->
            <li class="">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Product Category</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="index.php?page=addCategory">Add Category</a></li>
                    <li><a href="index.php?page=categoryDetails">Category Details</a></li>
                </ul>
            </li>
            <!-- Products pages -->
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Products</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="index.php?page=addProduct">Add Product</a></li>
                    <li><a href="index.php?page=productList">Product List</a></li>
                </ul>
            </li>
            <!-- Order menu -->
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Order</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="index.php?page=oredrDetails">Order Details</a></li>
                </ul>
            </li>
            <!-- User menu -->
            <li>
                <a href="index.php?page=users">
                    <i class="fa fa-users"></i> 
                    <span class="nav-label">Users</span> 
                    <!-- <span class="fa arrow"></span> -->
                </a>
            </li>
            <!-- User menu -->
            <li>
                <a href="index.php?page=mail">
                    <i class="fa fa-envelope"></i> 
                    <span class="nav-label">Mail</span> 
                    <!-- <span class="fa arrow"></span> -->
                </a>
            </li>
            <!-- Role and permission -->
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Role & Permissions</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="index.php?page=role">Roles</a></li>
                    <li><a href="index.php?page=permission">Permissions</a></li>
                </ul>
            </li>
            <!-- Invoice -->
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Invoice</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="index.php?page=invoice">Invoice</a></li>
                </ul>
            </li><!-- Edit menu -->
        </ul>
    </div>
</nav>