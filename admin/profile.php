<?php 
require '../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
?>

<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile Detail</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="../uploads/profile/<?php echo $admin['admin_photo']; ?>">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong><?php echo $_SESSION['name']; ?></strong></h4>
                        <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                        <h5>
                            About me
                        </h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                        </p>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>169</strong> Posts</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>28</strong> Following</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                                <h5><strong>240</strong> Followers</h5>
                            </div>
                        </div>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#profile"><i class="fa fa-edit"></i> Edit Profile</button>
                                </div>
                            </div>

                        <!-- MOdal Start here -->
                            <div class="modal inmodal animated slideInRight" id="profile" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn btn-danger btn-circle btn-outline pull-right btn-xs" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"> Edit Profile</h4>
                                        </div>
                                        <?php 
                                            $query = $connection->prepare("SELECT `admin_id`,`name`,`username`,`admin_photo` FROM `admins` WHERE `username` = :username");
                                            $query->bindValue(':username', $_SESSION['username']);
                                            $query->execute();
                                            $admin = $query->fetch();
                                        ?>
                                        <?php 
                                            if (isset($_POST['edit_profile'])) {
                                                $admin_id = trim($_POST['admin_id']);
                                                $name = trim($_POST['name']);
                                                $username = trim($_POST['username']);
                                                $admin_photo = $_POST['admin_photo'];
                                                $errors = [];
                                                $msgs = [];

                                                //validation check
                                                if (strlen($_POST['username']) < 6) {
                                                    $errors[] = 'Username must be at least 6 characters.';
                                                }
                                                //Upload profile picture
                                                if (!empty($_FILES['admin_photo']['tmp_name'])) {
                                                    $admin_photo = time() . $_FILES['admin_photo']['name'];
                                                    $dest = '../uploads/profile/' . $admin_photo;
                                                    // create an image manager instance with favored driver
                                                    $image = new ImageManager();

                                                    $image->make($_FILES['admin_photo']['tmp_name'])
                                                            ->resize(300, 200)
                                                            ->save($dest);
                                                    // unlink('../uploads/cat_images/' . $admin['admin_photo']);
                                                    //move_uploaded_file($_FILES['admin_photo']['tmp_name'], $dest);
                                                }
                                                
                                                //if no errors 
                                                if (empty($errors)) {
                                                    $query = $connection->prepare("UPDATE `admins` SET `name` = :name, `username` = :username, `admin_photo` = :admin_photo WHERE `admin_id` = :admin_id");
                                                    $query->bindValue(':admin_id', $admin_id);
                                                    $query->bindValue(':name', $name);
                                                    $query->bindValue(':username', $username);
                                                    $query->bindValue(':admin_photo', $admin_photo);
                                                    $query->execute();
                                                    if ($query->rowCount() === 1) {
                                                        $msgs[] = 'Profile Updated Successfully !!';
                                                    }
                                                }
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
                                                        <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
                                                        <label for="name" class=" control-label">Full Name</label>
                                                        <div class="">
                                                            <input type="text" name="name" value="<?php echo $admin['name']; ?>" id="name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username" class=" control-label">User Name</label>
                                                        <div class="">
                                                            <input type="text" name="username" value="<?php echo $admin['username']; ?>" id="username" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="admin_photo" class=" control-label">Profile Photo</label>
                                                        <div class="">
                                                            <input type="file" name="admin_photo" id="admin_photo" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Close</button>
                                            <button type="submit" name="edit_profile" class="btn btn-primary btn-xs">Update Profile</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- Modal close -->
                        <!-- MOdal End here -->

                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Activites</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a1.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">1m ago</small>
                                    <strong>Sandra Momot</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                    <div class="actions">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                        <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Love</a>
                                    </div>
                                </div>
                            </div>

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">5m ago</small>
                                    <strong>Monica Smith</strong> posted a new blog. <br>
                                    <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                                </div>
                            </div>

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a2.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">2h ago</small>
                                    <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                    <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                    <div class="well">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                        <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                        <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a3.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">2h ago</small>
                                    <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 8:30am</small>
                                    <div class="photos">
                                        <a target="_blank" href="http://24.media.tumblr.com/20a9c501846f50c1271210639987000f/tumblr_n4vje69pJm1st5lhmo1_1280.jpg"> <img alt="image" class="feed-photo" src="img/p1.jpg"></a>
                                        <a target="_blank" href="http://37.media.tumblr.com/9afe602b3e624aff6681b0b51f5a062b/tumblr_n4ef69szs71st5lhmo1_1280.jpg"> <img alt="image" class="feed-photo" src="img/p3.jpg"></a>
                                        </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    <div class="actions">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                        <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a5.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">2h ago</small>
                                    <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                    <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                    <div class="well">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>