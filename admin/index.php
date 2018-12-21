<?php 
session_start();

if(empty($_SESSION) || empty($_SESSION['id']) || empty($_SESSION['username'])){
    header('location: login.php');
}

?>
   <?php include_once 'inc/main_header.php'; ?>
    <div id="wrapper">
        
        <?php include_once 'inc/sidebar.php' ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                      <!--<span class="m-r-sm text-muted welcome-message">Welcome to AHN Admin Panel.</span> -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.php" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.php" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.php" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.php">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.php">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.php">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.php">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.php">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row  border-bottom white-bg dashboard-header">
                        
                        <?php
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                            if($page == 'profile'){
                            $title = "<h3> Profile </h3>";
                        }
                        if($page == 'dashboard'){
                            $title = "<h3> Welcome to SS Dashboard </h3>";
                        }
                        if($page == 'addCategory'){
                            $title = "<h3> Add Category </h3>";
                        }
                        if($page == 'categoryDetails'){
                            $title = "<h3>Category Details</h3>";
                        }
                        if($page == 'edit_category'){
                            $title = "<h3>Edit Category</h3>";
                        }
                        // 
                        if ($page == 'addProduct') {
                            $title = "<h3>Add Product</h3>";
                        }
                        if ($page == 'productList') {
                           $title = "<h3>Product List</h3>";
                        }
                        if ($page == 'edit_product') {
                            $title = "<h3>Edit Product</h3>";
                        }
                        if ($page == 'oredrDetails') {
                           $title = "<h3>Order Details</h3>";
                        }
                        if ($page == 'users') {
                           $title = "<h3>User Details</h3>";
                        }
                        if ($page=='mail') {
                           $title = "<h3>Mail Box</h3>";
                        }
                        if ($page == 'mail_compose') {
                            $title = '<h3>Compose Mail</h3>';
                        }
                        if ($page=='invoice') {
                           $title='
                            <div class="pull-right">
                                <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="javascript:window.print()" class="btn btn-white"><i class="fa fa-check "></i> Save </a>
                                <a href="invoice_print.php" target="_blank" class="btn btn-primary">
                                    <i class="fa fa-print"></i> Print Invoice </a>
                            </div>
                            <h3> Invoice </h3>
                           ';
                        }
                        }
                        else{
                            $page='';
                             $title="<h3>Page Not Found</h3>";
                        }
                        
                        ?>
            <div class="col-md-12">
                <?php echo $title; ?>
            </div>
            <!-- <div class="col-md-6">
                
            </div> -->
        </div>

<!-- Code will go here. -->

        <div class="page-content">
            <?php

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = '';
            }
            if($page == 'profile'){
                include 'profile.php';
            }
            if($page == 'dashboard'){
                include 'dashboard.php';
            }
            if($page == 'addCategory'){
                include 'addCategory.php';
            }
            if($page == 'categoryDetails'){
                include 'category_details.php';
            }
            if($page == 'edit_category'){
                include 'edit_category.php';
            }
            if($page == 'addProduct'){
                include 'addProduct.php';
            }
            if($page == 'productList'){
                include 'productList.php';
            }
            if($page == 'edit_product'){
                include 'edit_product.php';
            }
            if($page == 'oredrDetails'){
                include 'orders.php';
            }
            if($page == 'users'){
                include 'addUser.php';
            }
            if($page == 'mail'){
                include 'mail.php';
            }
            if($page == 'mail_compose'){
                include 'mail_compose.php';
            }
            if($page == 'invoice'){
                include 'invoice.php';
            }
            else if($page == ''){
                include "404.php";
            }

             ?>
        </div>

<!-- code will be end here . -->

        <div class="footer">
            <div class="pull-right">
                Designed By - <strong class="text-info">A.H Nayeem</strong>
            </div>
            <div>
                <strong>Copyright</strong> AHN &copy; <?php echo date('Y'); ?>
            </div>
        </div>

        </div>
        
        <?php include_once 'inc/right_sidebar.php' ?>

    </div>
<?php include_once 'inc/main_footer.php'; ?>
