<?php 

require '../vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
//
$pro_query = $connection->prepare("SELECT * FROM `categories`");
$pro_query->execute();
$cate_data = $pro_query->fetchAll();

?>
<?php 

    if (isset($_POST['add_product'])) {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $sub_text = $_POST['sub_text'];
        $product_qty = $_POST['product_qty'];
        $product_price = $_POST['product_price'];
        $product_discount = $_POST['product_discount'];
        $product_desc = $_POST['product_desc'];
        $product_photo = '';
        $errors = [];
        $msgs = [];

        // validation check
        if (strlen($_POST['product_name']) < 4) {
            $errors[] = 'Product name must be at least 4 characters';
        }
        // Upload product Photo
        if (!empty($_FILES['product_photo']['tmp_name'])) {
            $product_photo = time() . $_FILES['product_photo']['name'];
            $dest = '../uploads/product/' . $product_photo;
            // create an image manager instance with favored driver
            $image = new ImageManager();

            $image->make($_FILES['product_photo']['tmp_name'])
            ->resize(400, 450)
            ->save($dest);
        }
        
        //if no errors than Upload in DB
        
        if (empty($errors)) {
            $pro_query = $connection->prepare("INSERT INTO `products`(`product_name`,`category_id`,`sub_text`,`product_qty`,`product_price`,`product_discount`,`product_desc`,`product_photo`) VALUES(:product_name,:category_id,:sub_text,:product_qty,:product_price,:product_discount,:product_desc,:product_photo)");
            $pro_query->bindValue(':product_name',$product_name);
            $pro_query->bindValue(':category_id',$category_id, PDO::PARAM_INT);
            $pro_query->bindValue(':sub_text',$sub_text);
            $pro_query->bindValue(':product_qty',$product_qty);
            $pro_query->bindValue(':product_price',$product_price);
            $pro_query->bindValue(':product_discount',$product_discount);
            $pro_query->bindValue(':product_desc',$product_desc);
            $pro_query->bindValue(':product_photo',$product_photo);
            $pro_query->execute();

            // message the user
            $msgs[] = 'Product Added Successfully!';
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
                                        <input name="product_name" id="product_name" placeholder="Product Name" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_text" class="col-lg-4 control-label">Sub Text</label>
                                    <div class="col-lg-7">
                                        <input name="sub_text" id="sub_text" placeholder="Sub Text" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="col-lg-4 control-label">Product Category</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="category_id" id="category_id" required">
                                            <option selected>-- Select Category --</option>
                                            <?php foreach ($cate_data as $value) { ?>
                                            <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                                                
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_qty" class="col-lg-4 control-label">Quantity</label>
                                    <div class="col-lg-7">
                                        <input name="product_qty" id="product_qty" placeholder="" class="form-control" type="number"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_price" class="col-lg-4 control-label">Price</label>
                                    <div class="col-lg-7">
                                        <input name="product_price" id="product_price" placeholder="000$" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_discount" class="col-lg-4 control-label">Discount</label>
                                    <div class="col-lg-7">
                                        <input name="product_discount" id="product_discount" placeholder="0.00%" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_desc" class="col-lg-4 control-label">Product Description</label>
                                    <div class="col-lg-7">
                                        <textarea name="product_desc" id="product_desc" class="form-control" placeholder="Description About Product"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_photo " class="col-lg-4 control-label">Product Image</label>
                                    <div class="col-lg-7">
                                        <input name="product_photo" id="product_photo" class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-7">
                                        <button name="add_product" class="btn btn-primary btn-block btn-sm"/>Add Product</button>
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
