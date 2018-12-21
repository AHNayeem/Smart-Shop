<?php 
require '../vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
?>

<?php 

if (isset($_POST['add_category'])) {
    $cate_name = trim($_POST['category_name']);
    $cate_desc = trim($_POST['category_desc']);
    $cate_img = '';
    $errors = [];
    $msgs = [];

    //validation check
    //
    if (strlen($_POST['category_name']) < 4) {
        $errors[] = 'Category name must be at least 4 characters.';
    }
    if (!empty($_FILES['category_img']['tmp_name'])) {
        $cate_img = time() . $_FILES['category_img']['name'];
        $dest = '../uploads/category/' . $cate_img;

        //Create an image manager instance with favour driver
        $image = new ImageManager();

        $image->make($_FILES['category_img']['tmp_name'])
        ->resize(300, 200)
        ->save($dest);
        // move_uploaded_file($_FILES['category_img']['tmp_name'], $dest);
    }

    //IF no errors 

    if (empty($errors)) {
        $query = $connection->prepare("INSERT INTO `categories`(category_name,category_desc,category_photo) VALUES(:category_name,:category_desc,:category_photo)");
        $query->bindValue(':category_name', $cate_name);
        $query->bindValue(':category_desc', $cate_desc);
        $query->bindValue(':category_photo', $cate_img);
        $query->execute();

        //Show Successful message
        
        $msgs[] = 'Category Added Successfully !';
        
    }
}

?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
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
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><!-- Basic Data Tables example with responsive plugin --></h5>
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

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div  class="col-md-8">
                                <div class="form-group">
                                    <label for="category_name" class="col-lg-4 control-label">Category Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_desc" class="col-lg-4 control-label">Category Description</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="category_desc" id="category_desc" placeholder="Category Description" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_img" class="col-lg-4 control-label">Category Image</label>
                                    <div class="col-lg-7">
                                        <input type="file" name="category_img" id="category_img"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-7">
                                        <button name="add_category" class="btn btn-primary btn-block btn-sm"/>Add Category</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
       