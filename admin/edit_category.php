<?php
if(empty($_SESSION) || empty($_SESSION['id'] || empty($_SESSION['username']))){
    header('Location: index.php');
}
require '../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
$title = "<b>Edit Category</b>";
?>
<?php 
if (isset($_GET['id'])) {
$query = $connection->prepare('SELECT category_name,category_desc,category_photo FROM `categories` WHERE `category_id`= :category_id');
$query->bindValue(':category_id',$_GET['id'], PDO::PARAM_INT);
$query->execute();
$data = $query->fetch();
}
//get user input
if (isset($_POST['update'])) {
    $cate_name = trim($_POST['category_name']);
    $cate_desc = trim($_POST['category_desc']);
    $cate_img = $data['category_photo'];
    $errors = [];
    $msgs = [];

    //validate

    if (strlen($_POST['category_name']) < 4) {
        $errors[] = 'Category name must be at least 4 characters';
    }

    if (!empty($_FILES['category_img']['tmp_name'])) {
        $cate_img = time() . $_FILES['category_img']['name'];
        $dest = '../uploads/category/' . $cate_img;
        // create an image manager instance with favored driver
        $image = new ImageManager();

        $image->make($_FILES['category_img']['tmp_name'])
                ->resize(300, 200)
                ->save($dest);
        unlink('../uploads/cat_images/' . $data['category_photo']);
        //move_uploaded_file($_FILES['category_img']['tmp_name'], $dest);
    }
//if no errors DB upload

    if (empty($errors)) {
        $query = $connection->prepare("UPDATE `categories` SET `category_name` = :category_name ,`category_desc` = :category_desc ,`category_photo`= :category_photo WHERE `category_id`= :category_id");
        $query->bindValue(':category_id', $_GET['id'], PDO::PARAM_INT);
        $query->bindValue(':category_name', $cate_name);
        $query->bindValue(':category_desc', $cate_desc);
        $query->bindValue(':category_photo', $cate_img);
        $query->execute();
//        var_dump($query->execute());die();
        if ($query->rowCount() === 1) {
            //message the user.
            $msgs[] = "Category updated successfully";

            $query = $connection->prepare('SELECT * FROM `categories` WHERE `category_id`= :category_id');
            $query->bindValue(':category_id', $_GET['id'], PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetch();
        }
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
                                    <label class="col-lg-4 control-label">Category Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="category_name" value="<?php echo $data['category_name']; ?>" id="category_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Category Description</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="category_desc" value="<?php echo $data['category_desc']; ?>" id="category_desc" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Category Image</label>
                                  <img width="100px;"src="../uploads/category/<?php echo $data['category_photo']; ?>" class="">
                                    <div class="col-lg-5">
                                        <input type="file" name="category_img" id="category_img"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-7">
                                        <button type="submit" name="update" class="btn btn-primary btn-block btn-sm"/>Update</button>
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