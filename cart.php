<?php require "inc/header.php"; ?>
            <!-- Section start -->
                <section>
                    <div class="block color-scheme-3">
                        <div class="container">
                            <div class="header-1">
                                <h1>Shopping Cart</h1>
                                <div class="header-bottom-line"></div>
                                <h3>Products were added to your shopping cart</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <table class="cart-table table">
                                            <thead>
                                                <tr>
                                                    <th class="card_product_image">Image</th>
                                                    <th class="card_product_name">Product Name</th>
                                                    <!-- <th class="card_product_model">Model</th> -->
                                                    <th class="card_product_quantity">Quantity</th>
                                                    <th class="card_product_price">Unit Price</th>
                                                    <th class="card_product_quantity">Remove Cart</th>
                                                    <th class="card_product_total">Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php echo cartDisplay(); ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="row">
                                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="block-form box-border">
                                                <h3>Estimate Shipping & Taxes</h3>
                                                <hr>
                                                <form action="#" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Your Country</label>
                                                            <select name="country" class="form-control">
                                                                <option selected="selected">Country 1</option>
                                                                <option>Country 2</option>
                                                                <option>Country 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Your Region</label>
                                                            <select name="Region" class="form-control">
                                                                <option selected="selected">Region 1</option>
                                                                <option>Region 2</option>
                                                                <option>Region 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Your Post Code</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="submit"  value="Get Quotes"  class="btn-default-1">
                                                        </div>
                                                    </div>                                    
                                                </form>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="row">
                                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="block-form box-border">
                                                <h3>Apply Discount Code</h3>
                                                <hr>
                                                <form action="#" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Discount Code</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="submit"  value="Apply Coupon"  class="btn-default-1">
                                                        </div>
                                                    </div>                                    
                                                </form>
                                            </div>
                                        </article>
                                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="block-form box-border">
                                                <h3>Use Gift Voucher</h3>
                                                <hr>
                                                <form action="#" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Voucher Code</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="submit"  value="Apply Voucher"  class="btn-default-1">
                                                        </div>
                                                    </div>                                    
                                                </form>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="row">
                                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="block-form block-order-total box-border">
                                                <h3>Total</h3>
                                                <hr>
                                                <ul class="list-unstyled">
                                                    <li>Sub Total: <strong><?php echo $_SESSION['net_total']; ?></strong></li>
                                                    <li>Pricing Sharge: <strong>$0.00</strong></li>
                                                    <li>Promotion Discound: <strong>$0.00</strong></li>
                                                    <li>VAT: <strong>$0.00</strong></li>
                                                    <li><hr></li>
                                                    <li class="active"><b>Total:</b> <strong>Tk. <?php echo $_SESSION['net_total']; ?> </strong></li>                                    
                                                </ul>
                                                <a href="index.php" class="btn-default-1">Contuine Shoping</a>
                                                <a href="checkout.php" class="btn-default-1">Checkout</a>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- Section end -->

<?php require "inc/footer.php"; ?>