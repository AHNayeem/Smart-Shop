<?php require "inc/header.php"; ?>
<?php 

if (isset($_GET['pro_id'])) {
    $query = $connection->prepare("SELECT * FROM `products` WHERE `product_id` = :product_id");
    $query->bindValue('product_id', $_GET['pro_id'], PDO::PARAM_INT);
    $query->execute();
    $pro_data = $query->fetch();
}
    //Call Function
echo add_cart();
?>
            <!--  -->
                 <section style="margin-top: 20px;">
                    <div class="color-scheme-3">
                        <div class="container">
                            <div class="row">
                                <div class="product-detail-section col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                    <div class="product-list">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="product-image">
                                                    <img id="product-zoom"  src='uploads/product/<?php echo $pro_data['product_photo']; ?>' data-zoom-image="uploads/product/<?php echo $pro_data['product_photo']; ?>" alt="">
                                                    <!-- <div id="gal1">

                                                        <a href="javascript:;" data-image="img/product/small/product1.jpg" data-zoom-image="img/product/large/product1.jpg">
                                                            <img id="img_01" src="img/preview/product/thumb/product1.jpg" alt="">
                                                        </a>

                                                        <a href="javascript:;" data-image="img/product/small/product2.jpg" data-zoom-image="img/product/large/product2.jpg">
                                                            <img id="img_01" src="img/preview/product/thumb/product2.jpg"  alt="">
                                                        </a>

                                                        <a href="javascript:;"  data-image="img/product/small/product3.jpg" data-zoom-image="img/product/large/product3.jpg">
                                                            <img id="img_01" src="img/product/thumb/product3.jpg" />
                                                        </a>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <h3>Tango summer dress</h3>
                                                <div class="product-rating">
                                                    <div class="stars">
                                                        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                    </div>
                                                </div>
                                                <div class="product-information">
                                                    <div class="clearfix"> 
                                                        <label class="pull-left">Brand:</label> <a href="#">Arsenal Sweet</a><br>
                                                    </div>
                                                    <div class="clearfix"> 
                                                        <label class="pull-left">Collection:</label> Summer collection
                                                    </div>
                                                    <!-- <div class="clearfix"> 
                                                        <label class="pull-left">Product Code:</label> Fashion 17
                                                    </div> -->
                                                    <div class="clearfix">
                                                        <label class="pull-left">Size:</label>
                                                        <select name="size" class="form-control">
                                                            <option value="" selected="selected">...</option>
                                                            <option value="1">S</option>
                                                            <option value="1">M</option>
                                                            <option value="1">L</option>
                                                            <option value="2">XL</option>
                                                            <option value="3">XLL</option>
                                                        </select>
                                                    </div>
                                                    <div class="clearfix">
                                                        <label class="pull-left">Availability:</label>
                                                        <p><?php echo $pro_data['product_qty']; ?> Items in stock</p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <label class="pull-left">Quantity:</label>
                                                        <select name="quantity" class="form-control">
                                                            <option value="0" selected="selected">...</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="..." disabled>...</option>
                                                            <option value="30">30</option>
                                                        </select>
                                                    </div>
                                                    <div class="clearfix">
                                                        <label class="pull-left">Price:</label>
                                                        <p class="product-price"><span>$469.99</span> <?php echo $pro_data['product_price']; ?> Tk.</p>
                                                    </div>
                                                    <div class="header-1">
                                                        <div class="header-bottom-line"></div>
                                                    </div>
                                                    <div class="list-shopping-cart text-center">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            
                                                            <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                            <input type="hidden" name="product_id" value="<?php echo $pro_data['product_id'] ?>">
                                                            <a href="#" class="shoping" name="addcart" style="color: #fff">
                                                                <button type="submit" class="btn btn-link " name="addcart">
                                                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                                                </button>
                                                            </a>
                                                            <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-border block-form">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills  nav-justified">
                                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                                            <li><a href="#additional" data-toggle="tab" class="disabled">Additional</a></li>
                                            <li><a href="#review" data-toggle="tab">Review</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="description">
                                                <br>
                                                <h3>Product Details</h3>
                                                <hr>
                                                <p>
                                                    <?php echo $pro_data['product_desc']; ?>
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="additional">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h3>Sizes</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4 block-color">
                                                        <h3>Colors</h3>
                                                        <hr>
                                                        <ul class="colors clearfix list-unstyled">
                                                            <li><a href="" rel="" style="background-color: rgb(0, 61, 113);"> </a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(196, 44, 57);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(244, 188, 8);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(2, 136, 44);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(0, 0, 0);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(202, 204, 206);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(255, 255, 255);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(249, 231, 182);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(90, 67, 63);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(90, 67, 63);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(255, 155, 181);"></a></li>
                                                            <li><a href="" rel="" style="background-color: rgb(140, 86, 169);"></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h3>Other</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="review">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Clients review</h3>
                                                        <hr>
                                                        <div class="review-header">
                                                            <h5>John Doe</h5>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                            <small class="text-muted">26/03/2014</small>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="review-header">
                                                            <h5>John Doe</h5>
                                                            <div class="product-rating">
                                                                <div class="stars">
                                                                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                </div>
                                                            </div>
                                                            <small class="text-muted">26/03/2014</small>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <form role="form" method="post" action="#">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputFirstName" class="control-label">First Name:<span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputFirstName">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputCompany" class="control-label">Company:</label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputCompany">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control">    </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label  class="control-label">Your Rate:</label>
                                                                <div class="product-rating">
                                                                    <div class="stars">
                                                                        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="submit"  class="btn-default-1" value="Add Review">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                                    <article class="side-category" style="text-align: left;border: 1px solid #eee;border-top: none;margin:0 0 30px;">
                                        <div class="cat_header">
                                            <h3>Category</h3>
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
                                                <li><a href="#"><i class="fa fa-angle-right"></i>  DRESSES </a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>  MATERNITY </a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </article>
                                    <article>
                                        <div class="block-3-col week-sale">
                                            <div class="header-2">
                                                <h3>Deadline sales</h3>
                                            </div>
                                            <div class="sale-info"><span>19%</span><br> off</div>
                                            <div class="product-sale-time"><p class="time"></p></div>
                                            <a href="#">
                                                <img class="img-responsive" src="img/preview/product1.jpg" alt="" title="">
                                            </a>
                                        </div>
                                    </article>
                                    <article class="block-side-products">
                                        <div class="banner">
                                            <a href="#">
                                                <img src="img/preview/banner1.jpg" class="img-responsive" alt="">
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!--  -->

 <?php require "inc/footer.php"; ?>