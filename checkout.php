<?php require "inc/header.php"; ?>

            <!-- Section  Start-->
                <section>
                    <div class="block color-scheme-3 checkout">
                        <div class="container">
                            <div class="header-1">
                                <h1>Checkout</h1>
                                <div class="header-bottom-line"></div>
                                <h3>Lorem ipsum dolor sit amet</h3>
                            </div>
                            <div class="row">
                                <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="box-border block-form">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills  nav-justified">
                                            <li class="active"><a href="#address" data-toggle="tab"><i class="fa fa-thumb-tack"></i>Billing Address</a></li>
                                            <li><a href="#shipping" data-toggle="tab" class="disabled"><i class="fa fa-truck"></i>Shipping Method</a></li>
                                            <li><a href="#payment" data-toggle="tab"><i class="fa fa-money"></i>Payment Method</a></li>
                                            <li><a href="#review" data-toggle="tab"><i class="fa fa-check"></i>Order Review</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="address">
                                                <br>
                                                <h3>Account & Billing Details</h3>
                                                <hr>
                                                <form role="form" method="post" action="">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputFirstName" class="control-label">First Name:<span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputFirstName">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputLastName" class="control-label">Last Name:<span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputLastName">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEMail" class="control-label">E-Mail:<span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="email" class="form-control" id="inputEMail">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPhone" class="control-label">Phone:</label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputPhone">
                                                                </div>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="inputFax" class="control-label">Fax:</label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputFax">
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <!-- <div class="form-group">
                                                                <label for="inputCompany" class="control-label">Company:</label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputCompany">
                                                                </div>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="inputAdress1" class="control-label">Address : <span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputAdress1">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputCity" class="control-label">City: <span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputCity">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPostCode" class="control-label">Post Code: <span class="text-error">*</span></label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="inputPostCode">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Contury: <span class="text-error">*</span></label>
                                                                        
                                                                        <div>
                                                                            <select name="inputContury" class="form-control">
                                                                                <option value="#">-Conturies-</option>
                                                                                <option value="#">Contury1</option>
                                                                                <option value="#">Contury2</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Region: <span class="text-error">*</span></label>
                                                                        <div>
                                                                            <select name="inputRegion" class="form-control">
                                                                                <option value="#">-Regions-</option>
                                                                                <option value="#">Region1</option>
                                                                                <option value="#">Region2</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <hr>
                                                <a href="#" class="btn-default-1">Back</a>
                                                <a href="#" name="billing_details" class="btn-default-1">Next</a>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="shipping">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h3>Free</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                        <div class="radio">
                                                            <label class="color-active">
                                                                <input type="radio" name="shipping" id="shipping1" value="0">
                                                                Free
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h3>Standart</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                        <div class="radio">
                                                            <label class="color-active">
                                                                <input type="radio" name="shipping" id="shipping2" value="0">
                                                                $5 Rate
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h3>Speed</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                        <div class="radio">
                                                            <label class="color-active">
                                                                <input type="radio" name="shipping" id="shipping3" value="0">
                                                                $15 Rate
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <hr>
                                                <a href="#" class="btn-default-1">Back</a>
                                                <a href="#" class="btn-default-1">Next</a>
                                            </div>
                                            <div class="tab-pane" id="payment">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h3>Pay Pal</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                        <div class="radio">
                                                            <label class="color-active">
                                                                <input type="radio" name="payment" id="payment1" value="0">
                                                                Pay Pal
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h3>Visa Card</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                        <div class="radio">
                                                            <label class="color-active">
                                                                <input type="radio" name="payment" id="payment2" value="0">
                                                                Visa Card
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h3>Stripe</h3>
                                                        <hr>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                                        </p>
                                                        <div class="radio">
                                                            <label class="color-active">
                                                                <input type="radio" name="payment" id="payment3" value="0">
                                                                Stripe
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <a href="#" class="btn-default-1">Back</a>
                                                <a href="#" class="btn-default-1">Next</a>
                                            </div>
                                            <div class="tab-pane" id="review">
                                                <br>
                                                <h3>Review</h3>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="cart-table table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="card_product_image">Image</th>
                                                                    <th class="card_product_name">Product Name</th>
                                                                    <th class="card_product_model">Model</th>
                                                                    <th class="card_product_quantity">Quantity</th>
                                                                    <th class="card_product_price">Unit Price</th>
                                                                    <th class="card_product_total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="card_product_image" data-th="Image"><a href="#"><img title="Product Name" alt="Product Name" src="img/preview/product1.jpg"></a>
                                                                    </td>
                                                                    <td class="card_product_name" data-th="Product Name"><a href="#">Product Name</a>
                                                                    </td>
                                                                    <td class="card_product_model" data-th="Model">Pro 1</td>
                                                                    <td class="card_product_quantity" data-th="Quantity"><input type="number" min="0" value="1" name="" class="styler">
                                                                        &nbsp;
                                                                        &nbsp;<a href="#"><i class="fa fa-trash fa-large"></i> </a>
                                                                    </td>
                                                                    <td class="card_product_price" data-th="Unit Price">$77.00</td>
                                                                    <td class="card_product_total" data-th="Total">$77.00</td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="card_product_image" data-th="Image"><a href="#"><img title="Product Name" alt="Product Name" src="img/preview/product2.jpg"></a></td>
                                                                    <td class="card_product_name" data-th="Product Name"><a href="#">Product Name</a><br>
                                                                        <small>Information: 12s</small>
                                                                    </td>
                                                                    <td class="card_product_model" data-th="Model">Pro 2</td>
                                                                    <td class="card_product_quantity" data-th="Quantity"><input type="number" min="0" value="1" name="" class="styler">
                                                                        &nbsp;
                                                                        &nbsp;<a href="#"><i class="fa fa-trash fa-large"></i> </a>
                                                                    </td>
                                                                    <td class="card_product_price" data-th="Unit Price">$777.00</td>
                                                                    <td class="card_product_total" data-th="Total">$777.00</td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="card_product_image" data-th="Image"><a href="#"><img title="Product Name" alt="Product Name" src="img/preview/product3.jpg"></a></td>
                                                                    <td class="card_product_name" data-th="Product Name"><a href="#">Product Name</a></td>
                                                                    <td class="card_product_model" data-th="Model">Pro 3</td>
                                                                    <td class="card_product_quantity" data-th="Quantity"><input type="number" min="0" value="1" name="" class="styler">
                                                                        &nbsp;
                                                                        &nbsp;<a href="#"><i class="fa fa-trash fa-large"></i> </a>
                                                                    </td>
                                                                    <td class="card_product_price" data-th="Unit Price">$7.00</td>
                                                                    <td class="card_product_total" data-th="Total">$7.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <a href="#" class="btn-default-1">Pay</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="block-form block-order-total box-border">
                                        <h3>Total</h3>
                                        <hr>
                                        <ul class="list-unstyled">
                                            <li>Sub Total: <strong>$500.00</strong></li>
                                            <li>Pricing Sharge: <strong>$10.00</strong></li>
                                            <li>Promotion Discound: <strong>$5.00</strong></li>
                                            <li>VAT: <strong>$10.00</strong></li>
                                            <li><hr></li>
                                            <li class="active"><b>Total:</b> <strong>$520.00</strong></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>

            <!-- Section end-->

 <?php require "inc/footer.php"; ?>