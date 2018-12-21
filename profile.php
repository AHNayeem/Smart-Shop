<?php require "inc/header.php"; ?>
<?php  
    
    if (empty($_SESSION) || empty($_SESSION['customer_id']) || empty($_SESSION['email'])) {
        echo "<script>window.open('login.php','_self');</script>";
    }


?>
            <!-- Section start -->
                <section>
                    <div class="block color-scheme-3" style="padding-top: 0;">
                        <div class="container">
                            <div class="col-lg-12 col-sm-6">
                            <div class="card hovercard">
                                <div class="card-background">
                                    <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
                                    <!-- http://lorempixel.com/850/280/people/9/ -->
                                </div>
                                <div class="useravatar">
                                    <img alt="" src="img/team/t2.jpg">
                                </div>
                                <div class="card-info"> <span class="card-title"><?php echo $_SESSION['customer_name']; ?></span>

                                </div>
                            </div>
                            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <button type="button" id="stars" class="btn btn-warning" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <div class="hidden-xs">Stars</div>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                                        <div class="hidden-xs">Favorites</div>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <div class="hidden-xs">Following</div>
                                    </button>
                                </div>
                            </div>

                                <div class="well">
                              <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1">
                                  <h3>This is tab 1</h3>
                                </div>
                                <div class="tab-pane fade in" id="tab2">
                                  <h3>This is tab 2</h3>
                                </div>
                                <div class="tab-pane fade in" id="tab3">
                                  <h3>This is tab 3</h3>
                                </div>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- Section end -->
<?php require "inc/footer.php"; ?>