<?php
session_start();
 require 'connection.php';
 include 'function.php';
 ?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Smart || Shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
         <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="wowslide/style.css" />
        <script type="text/javascript" src="wowslide/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/team.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!-- Add your site or application content here -->
        <div class="wrapper">
            <header id="header"> <!-- Full Header -->
                <!-- Top Header -->
                <div class="top_header">
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <div class="col-md-4">
                                    <ul class="top_menu list-unstyled list-inline">
                                        <li><a href="profile.php">Account</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <div class="login text-center">
                                        <p>Welcome visitor you can <a href="login.php">Login or Sign Up</a></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pull-right">
                                        <!-- header - language -->
                                        <div id="lang" class="pull-right">
                                            <a href="" class="lang-title">
                                                <img src="img/f-gb.png" alt="" title="English"> English <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="list-unstyled lang-item">
                                                <li class="active">
                                                    <a href="#"><img src="img/f-gb.png" alt="" title="English"> English</a></li>
                                                <li><a href="#"><img src="img/f-fr.png" alt="" title="French"> French</a></li>
                                            </ul>
                                        </div>
                                        <!-- /header - language -->
                                        <!-- header - currency -->
                                        <div class="currency pull-right">
                                            <ul class="currency-list list-unstyled list-inline">
                                                <li><a href="#">€</a></li>
                                                <li><a href="#" class="active">$</a></li>
                                                <li><a href="#">£</a></li>
                                            </ul>
                                        </div>
                                        <!-- /header - currency -->
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Container Close -->
                    </div><!-- Container Close -->
                </div> <!-- Top Header Close -->
                <!-- Mid Header -->
                <div class="mid_header clear">
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <div class="col-md-6">
                                    <div class="brand">
                                        <a href="index.php" style="text-decoration: none;">
                                            <h2><span style="color:#DF4E5A;">S</span>M<span style="color:#DF4E5A;">A</span>R<span style="color:#DF4E5A;">T</span> <span style="color:#DF4E5A;">S</span>H<span style="color:#DF4E5A;">O</span>P</h2>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mid_src pull-right">
                                                <div id="custom-search-input">
                                                    <form action="search.php" method="get" enctype="multipart/form-data" accept-charset="utf-8">
                                                        <div class="input-group col-md-12 ">
                                                               <input type="text" name="src_query" class="form-control input-sm" placeholder="Search..." />
                                                                <span class="input-group-btn">
                                                                <button class="btn btn-warning btn-sm" type="submit" name="search">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                                </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="cart text-center">
                                                <a href="cart.php">
                                                    <span class="badge badge-danger"><?php echo cartCount(); ?></span>
                                                    <img src="img/card.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- Row Close -->
                                </div><!-- col-md-6 -->
                            </div>
                        </div><!-- Row Close -->
                    </div><!-- Container Close -->
                </div><!-- Mid Header  Close-->
                <!-- Header Navigation -->
                <div class="header_nav ">
                    <div class="">
                        <nav class="navbar navbar-main clearfix" role="navigation">
                            <div class="border-menu-top"></div>
                            <div class="container">
                                <div class="row">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a href="index.php" class="navbar-brand"><i class="fa fa-home fa-lg"></i></a>
                                    </div>
                                    
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown">
                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu list-unstyled">
                                                    <li>
                                                        <a  href="index.php"> Home </a>
                                                    </li>
                                                    <li>
                                                        <a  href="index2.php"> Home 2</a>
                                                    </li>
                                                    <li>
                                                        <a  href="index-right-side.php"> Home Right Side</a>
                                                    </li>
                                                    <li>
                                                        <a  href="index-boxed.php"> Home Boxed</a>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a href="#"> Blog </a>
                                                        <ul class="dropdown-menu list-unstyled">
                                                            <li>
                                                                <a href="blogs.php"> Blogs </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-content.php"> Blog content </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a href="#"> Product </a>
                                                        <ul class="dropdown-menu list-unstyled">
                                                            <li>
                                                                <a href="products-grid.php"> Product grid </a>
                                                            </li>
                                                            <li>
                                                                <a href="products-list.php"> Product list </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-detail.php"> Product detail </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a  href="register.php"> Register </a>
                                                    </li>       
                                                </ul>
                                            </li>
                                            <li class=""><a href="#">Men's wear</a></li>
                                            <li><a href="#">Women's wear</a></li>
                                            <li class=""><a href="about.php">About</a></li>
                                            <li class=""><a href="contact.php">Contact</a></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#">Accessories</a></li>
                                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Other <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        </li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div> <!-- /.row Close -->
                            </div><!-- /.container Close -->
                        </nav>
                    </div>
                </div> <!-- Navigation Close -->
            </header>   <!-- Header Close  -->