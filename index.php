<?php require "inc/header.php"; ?>

<?php 

$query = $connection->prepare("SELECT * FROM `products`");
$query->execute();
$pro_data = $query->fetchAll();

?>
<?php 
    // include "inc/function.php";
    echo add_cart(); 
?>
        <div class="slider">
            <?php include "inc/slider.php" ?>
        </div> <!-- Slider Close -->
        <div class="product_margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <article class="side-category" style="text-align: left;border: 1px solid #eee;border-top: none;margin:10px 0 30px;">
                            <div class="cat_header">
                                <h3>Male Category</h3>
                            </div>
                            <div class="box">
                                <ul class="ul-side-category list-unstyled">
                                    <li><a href=""><i class="fa fa-angle-right"></i>  SWEATERS</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right"></i>  SHIRTS & TOPS</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  KNITS & TEES</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  PANTS </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  DENIM</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  DRESSES </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  MATERNITY </a>
                                    </li>

                                </ul> 
                            </div>

                        </article> 
                        <article class="side-category" style="text-align: left;border: 1px solid #eee;border-top: none;margin:10px 0 30px;">
                            <div class="cat_header">
                                <h3>Female Category</h3>
                            </div>
                            <div class="box">
                                <ul class="ul-side-category list-unstyled">
                                    <li><a href=""><i class="fa fa-angle-right"></i>  SWEATERS</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right"></i>  SHIRTS & TOPS</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  KNITS & TEES</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  PANTS </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  DENIM</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i>  DRESSES </a>
                                    </li>

                                </ul> 
                            </div>

                        </article>

                        <article>
                            <div class="block-3-col">
                                <div class="cat_header">
                                    <h3>Flickr Feed</h3>
                                </div>
                                <div class="block-inner block-fl-feed">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-md-4">
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/post-image-3.jpg" alt="image">
                                            </a> 
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-md-4">
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/post-image-2.jpg" alt="image">
                                            </a> 
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-md-4">
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/post-image-1.jpg" alt="image">
                                            </a> 
                                        </div>
                                  <!--   </div>
                                    <div class="row"> -->
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/post-image-5.jpg" alt="image">
                                            </a> 
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/post-image-1.jpg" alt="image">
                                            </a> 
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/post-image-4.jpg" alt="image">
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-9">
                        <div class="container-fluid">
                        <!-- Product List -->
                            <div class="block-product-tab">
                                <ul class="nav nav-pills  nav-justified">
                                    <li>
                                        <a href="#new" data-toggle="tab" style="font-size: 40px;font-family: 'Raleway', sans-serif;color: #444;">New</a>
                                        <div class="header-bottom-line"></div>
                                    </li>
                                    <li class="active">
                                        <a href="#featured" data-toggle="tab" class="disabled" style="font-size: 40px;font-family: 'Raleway', sans-serif; text-transform: uppercase;color: #444;">Featured</a>
                                        <div class="header-bottom-line"></div>
                                    </li>
                                    <li>
                                        <a href="#top" data-toggle="tab" style="font-size: 40px;font-family: 'Raleway', sans-serif;text-transform: uppercase;color: #444;">Top</a>
                                        <div class="header-bottom-line"></div>
                                    </li>
                                </ul>
                                <div class="tab-content product-section">
                                    <div class="tab-pane animated fadeIn" id="new">
                                        <ul class="row list-unstyled">
                                            <?php foreach ($pro_data as $value): ?>
                                                
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <form action="" method="post" enctype="multipart/form-data">                                               
                                                    <div class="row">
                                                        <div class="product">
                                                            <figure class="figure-hover-overlay">                                                                        
                                                                <a href="#" class="figure-href"></a>
                                                                <div class="product-sale">sale</div>
                                                                <img class="img-responsive" src="uploads/product/<?php echo $value['product_photo']; ?>" alt="" title="">
                                                                <span class="bar"></span>
                                                                <figcaption>
                                                                    <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                                                    <a href="#" class="shoping" name="addcart" style="color: #fff"><button type="submit" class="btn btn-link " name="addcart"><i class="glyphicon glyphicon-shopping-cart"></i></button></a>
                                                                    <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                                </figcaption>
                                                            </figure>
                                                            <div class="product-caption">
                                                                <a href="product-details.php?pro_id=<?php echo $value['product_id']; ?>" class="product-name"><?php echo $value['product_name']; ?></a>
                                                                <p class="product-price"><span>330$ </span> <?php echo $value['product_price']; ?> Tk.</p>
                                                                <div class="product-rating">
                                                                    <div class="stars">
                                                                        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="tab-pane active animated fadeIn" id="featured">
                                        <ul class="row list-unstyled">
                                            <?php
                                                $f_query = $connection->prepare('SELECT * FROM `products` WHERE `is_featured` = 1 LIMIT 6');
                                                $f_query->execute();
                                                $f_pro = $f_query->fetchAll();

                                                 foreach ($f_pro as $value): 
                                                ?>
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-new">new</div>
                                                            <img class="img-responsive" src="uploads/product/<?php echo $value['product_photo']; ?>" alt="" title="">

                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="product-details.php?pro_id=<?php echo $value['product_id']; ?>" class="product-name"><?php echo substr($value['product_name'], 0, 23); ?></a>
                                                            <p class="product-price"><span>450.99$</span>  <?php echo $value['product_price']; ?> Tk.</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach;?>
                                            
                                        </ul>
                                    </div>
                                    <div class="tab-pane animated fadeIn" id="top">
                                        <ul class="row list-unstyled">
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-sale">sale</div>
                                                            <img class="img-responsive" src="img/product/12.jpg" alt="" title="">
                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="#" class="product-name">Product name</a>
                                                            <p class="product-price"><span>330$</span> 320.99$</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-new">new</div>
                                                            <img class="img-responsive" src="img/product/13.jpg" alt="" title="">

                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="#" class="product-name">Product name</a>
                                                            <p class="product-price">450.99$</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-new">new</div>
                                                            <div class="product-sale">sale</div>
                                                            <img class="img-responsive" src="img/product/14.jpg" alt="" title="">

                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="#" class="product-name">Product name</a>
                                                            <p class="product-price">230.99$</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-new">new</div>
                                                            <div class="product-sale">sale</div>
                                                            <img class="img-responsive" src="img/product/15.jpg" alt="" title="">
                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="#" class="product-name">Product name</a>
                                                            <p class="product-price">530.99$</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-sale">sale</div>
                                                            <img class="img-responsive" src="img/product/16.jpg" alt="" title="">
                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="#" class="product-name">Product name</a>
                                                            <p class="product-price">320.99$</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                                                <div class="row">
                                                    <div class="product">
                                                        <figure class="figure-hover-overlay">                                                                        
                                                            <a href="#" class="figure-href"></a>
                                                            <div class="product-sale">sale</div>
                                                            <img class="img-responsive" src="img/product/17.jpg" alt="" title="">
                                                            <span class="bar"></span>
                                                            <figcaption>
                                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                                <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="product-caption">
                                                            <a href="#" class="product-name">Product name</a>
                                                            <p class="product-price">320.99$</p>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- Product List End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <a class="banner type4 margbot40" href="#"><img src="img/banner4.jpg" alt=""></a>
                    </div>
                    <div class="col-md-3">
                        <a class="banner nobord margbot40" href="#"><img src="img/banner5.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <section class="new_arrivals padbot50">
            <!-- CONTAINER-fluid -->
            <div class="container">
                <div class="row">
                <h2 style="">new arrivals</h2>
                <!-- JCAROUSEL -->
                <div class="jcarousel-wrapper">
                    <!-- NAVIGATION -->
                    <div class="jCarousel_pagination">
                        <a href="javascript:void(0);" class="jcarousel-control-prev" data-jcarouselcontrol="true"><i class="fa fa-angle-left"></i></a>
                        <a href="javascript:void(0);" class="jcarousel-control-next" data-jcarouselcontrol="true"><i class="fa fa-angle-right"></i></a>
                    </div><!-- //NAVIGATION -->
                    <div class="jcarousel animated fadeInUp" data-appear-top-offset="-100" data-animated="fadeInUp" data-jcarousel="true">
                        <ul class="list-unstyled" style="left: -800px; top: 0px;">
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/6.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">STRETCH PERFECT SHIRT</a>
                                        <span class="tovar_price">$72.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/1.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">Moonglow paisley silk tee</a>
                                        <span class="tovar_price">$98.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/2.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">PEASANT TOP IN SUCKERED STRIPE</a>
                                        <span class="tovar_price">$78.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/3.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">EMBROIDERED BIB PEASANT TOP</a>
                                        <span class="tovar_price">$88.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/4.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">SILK POCKET BLOUSE</a>
                                        <span class="tovar_price">$98.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/1.jpg" alt="">
                                        <div class="open-project-link"><a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a></div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">Moonglow paisley silk tee</a>
                                        <span class="tovar_price">$98.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/2.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">PEASANT TOP IN SUCKERED STRIPE</a>
                                        <span class="tovar_price">$78.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/3.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">EMBROIDERED BIB PEASANT TOP</a>
                                        <span class="tovar_price">$88.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/4.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">SILK POCKET BLOUSE</a>
                                        <span class="tovar_price">$98.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img class="img-responsive" src="img/women/new/5.jpg" alt="">
                                        <div class="open-project-link">
                                            <a class="open-project tovar_view" href="product-details.php" data-url="product-details.php">quick view</a>
                                        </div>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title" href="product-page.html">SWISS-DOT TUXEDO SHIRT</a>
                                        <span class="tovar_price">$65.00</span>
                                    </div>
                                </div><!-- //TOVAR -->
                            </li>
                        </ul>
                    </div>
                </div><!-- //JCAROUSEL -->
            </div>
            </div><!-- //CONTAINER -->
        </section>
        </div>
        <div class="">
            <div class="container-fluid">
                <div class="row">
                    
                </div>
            </div>
        </div>
<?php require "inc/footer.php"; ?>