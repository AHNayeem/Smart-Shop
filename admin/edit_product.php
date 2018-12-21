<?php 
require '../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

    $query = $connection->prepare("SELECT `category_name` FROM `categories`");
    $query->execute();
    $cate_data = $query->fetch();

    if (isset($_GET['id'])) {
        $stmt = $connection->prepare("SELECT * FROM `products` WHERE `product_id` = :product_id");
        $stmt->bindValue('product_id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $pro_data = $stmt->fetch();
    }
?>
<?php  
    if (isset($_POST['update'])) {
        $product_name = trim($_POST['product_name']);
        $sub_text = $_POST['sub_text'];
        $product_qty = $_POST['product_qty'];
        $product_price = $_POST['product_price'];
        $product_discount = $_POST['product_discount'];
        $product_desc = trim($_POST['product_desc']);
        $product_photo = $pro_data['product_photo'];
        $errors = [];
        $msgs = [];

        // validation Check
        if (strlen($_POST['product_name']) < 4) {
            $error[] = 'Product name must be at least 4 character.';
        }
        if (!empty($_FILE['product_photo']['tep_name'])) {
            $product_photo = time() . $_FILE['product_photo']['name'];
            $dest = '../uploads/product/' . $product_photo;
            // create an image manager instance with favored driver
            $image = new ImageManager();
            $image->make($_FILES['product_photo']['tmp_name'])
                ->resize(400, 450)
                ->save($dest);
        }
        //if no errors than DB Upload
        //
        if (empty($errors)) {
            $query = $connection->prepare("UPDATE `products` SET `product_name`=:product_name,`sub_text`=:sub_text,`product_qty`=:product_qty,`product_price`=:product_price,`product_discount`=:product_discount,`product_desc`=:product_desc,`product_photo`=:product_photo WHERE `product_id`=:product_id");
            $query->bindValue('product_id', $_GET['id'], PDO::PARAM_INT);
            $query->bindValue(':product_name', $product_name);
            $query->bindValue(':sub_text', $sub_text);
            $query->bindValue(':product_qty', $product_qty);
            $query->bindValue(':product_price', $product_price);
            $query->bindValue(':product_discount', $product_discount);
            $query->bindValue(':product_desc', $product_desc);
            $query->bindValue(':product_photo', $product_photo);
            $query->execute();

            //Message the user
            if ($query->rowCount() === 1) {
                $msgs[] = 'Product Updated Successfully !';

                $stmt = $connection->prepare('SELECT * FROM `products` WHERE `product_id` = :product_id');
                $stmt->bindValue('product_id', $_GET['id'], PDO::PARAM_INT);
                $stmt->execute();
                $pro_data = $stmt->fetch();
            }else{
                $error[] = 'Product Update Unsuccessful !';
            }
        }
    }
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
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
                                    <label for="product_name" class="col-lg-4 control-label">Product Name</label>
                                    <div class="col-lg-7">
                                        <input name="product_name" value="<?php echo $pro_data['product_name']; ?>" id="product_name" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_text" class="col-lg-4 control-label">Sub Text</label>
                                    <div class="col-lg-7">
                                        <input name="sub_text" value="<?php echo $pro_data['sub_text']; ?>" id="sub_text" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_name" class="col-lg-4 control-label">Product Category</label>
                                    <div class="col-lg-7">
                                        <input name="category_name" value="<?php echo $cate_data['category_name'] ?>" id="category_name" class="form-control" type="text" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_qty" class="col-lg-4 control-label">Quantity</label>
                                    <div class="col-lg-7">
                                        <input name="product_qty" value="<?php echo $pro_data['product_qty']; ?>" id="product_qty" class="form-control" type="number"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_price" class="col-lg-4 control-label">Price</label>
                                    <div class="col-lg-7">
                                        <input name="product_price" value="<?php echo $pro_data['product_price']; ?>" id="product_price" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_discount" class="col-lg-4 control-label">Discount</label>
                                    <div class="col-lg-7">
                                        <input name="product_discount" value="<?php echo $pro_data['product_discount']; ?>" id="product_discount" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_desc" class="col-lg-4 control-label">Product Description</label>
                                    <div class="col-lg-7">
                                        <textarea name="product_desc" id="product_desc" class="form-control"><?php echo $pro_data['product_desc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_photo " class="col-lg-4 control-label">Product Image</label>
                                    <img width="100px;"src="../uploads/product/<?php echo $pro_data['product_photo']; ?>" class="">
                                    <div class="col-lg-5">
                                        <input name="product_photo" id="product_photo" class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-7">
                                        <button name="update" class="btn btn-primary btn-block btn-sm"/>Product Update</button>
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