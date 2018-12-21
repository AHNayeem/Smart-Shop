<?php require "inc/header.php"; ?>
            
<?php 

    if (isset($_POST['customer_reg'])) {
        $name = trim($_POST['customer_name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $company = trim($_POST['company']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $postcode = trim($_POST['postcode']);
        $password = trim($_POST['password']);
        $cpassword = trim($_POST['cpassword']);
        $newsletter = trim($_POST['newsletter']);
        $errors = [];
        $msgs = [];

        // ckeck Validation 
        
        //Validation check
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = "Invalid Email Format";
        }
        if (strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters";
        }
        // if ($password !== $cpassword) {
        //     $errors[] = "Password did not Match !!";
        // }
        if (strcmp($password, $cpassword) !==0) {
            $errors[] = "Password did not Match !!";
        }

        // if no error
        
        if (empty($errors)) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $cpassword = password_hash($cpassword, PASSWORD_BCRYPT);
            $query = $connection->prepare("INSERT into `customers`(`customer_name`,`email`,`phone`,`company`,`billing_address`,`city`,`postcode`,`password`,`cpassword`,`newsletter`) VALUES(:customer_name, :email, :phone, :company, :address, :city, :postcode, :password, :cpassword, :newsletter)");
            $query->bindValue(':customer_name', $name);
            $query->bindValue(':email',$email);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':company', $company);
            $query->bindValue(':address', $address);
            $query->bindValue(':city', $city);
            $query->bindValue(':postcode', $postcode);
            $query->bindValue(':password', $password);
            $query->bindValue(':cpassword', $cpassword);
            $query->bindValue(':newsletter', $newsletter);
            $query->execute();

            $msgs[] = "Registration done Successfully!";

        }
    }

?>
            <!-- Section Start -->
                <section>
            <div class="block color-scheme-3">
                <div class="container">
                    <div class="header-1">
                        <h1>Register</h1>
                        <div class="header-bottom-line"></div>
                        <h3>CREATE NEW ACCOUNT</h3>
                    </div>
                    <div class="row">
                        <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="block-form box-border">
                                <h3>Personal Information</h3>
                                <hr>
                                <div>
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
                                <form class="form-horizontal" role="form" method="post" action="">
                                    <div class="form-group">
                                        <label for="Name" class="col-sm-3 control-label">Name:<span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="customer_name" class="form-control" id="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEMail" class="col-sm-3 control-label">E-Mail:<span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="inputEMail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-sm-3 control-label">Phone:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" class="form-control" id="inputPhone">
                                        </div>
                                    </div>
                                    <h3>Delivery Information</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label for="inputCompany" class="col-sm-3 control-label">Company:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="company" class="form-control" id="inputCompany">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAdress1" class="col-sm-3 control-label">Address : <span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" class="form-control" id="inputAdress1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="col-sm-3 control-label">City: <span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="city" class="form-control" id="inputCity">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPostCode" class="col-sm-3 control-label">Post Code: <span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="postcode" class="form-control" id="inputPostCode">
                                        </div>
                                    </div>
                                    <h3>Password</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-sm-3 control-label">Password: <span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="inputPassword1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword2" class="col-sm-3 control-label">Re-Password: <span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="cpassword" class="form-control" id="inputPassword2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newsletter" class="col-sm-3 control-label">Newsletter: <span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="newsletter" id="newsletter1" value="1" checked>
                                                    Subscribe
                                                </label>

                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="newsletter" id="newsletter2" value="0">
                                                    Unsubscribe
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">  I'v read and agreed on <a href="#">Condations</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" name="customer_reg" class="btn-default-1">Register</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </article>
                        <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="block-form box-border">
                                <h3>Checkout as Guest</h3>
                                <hr>
                                <p>Checkout as a guest instead!</p>
                                
                                <a href="#" class="btn-default-1">As Guest</a>
                            </div>
                            <div class="block-form box-border">
                                <h3>Conditions</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                                <blockquote>
                                <p>
                                    <abbr title="HyperText Markup Language Curabitur pretium tincidunt lacus. Nulla gravida orci a odio." class="initialism">HTML</abbr>
                                    Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque.
                                </p>
                                </blockquote>
                                <p>
                                    Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus.
                                </p>
                                <p>
                                    Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam.
                                </p>

                                
                                <a href="#" class="btn-default-1">Read more</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
            <!-- Section End -->

<?php require "inc/footer.php"; ?>