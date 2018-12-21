<?php 
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}
function add_cart(){
	include 'connection.php';
	if (isset($_POST['addcart'])) {
		$product_id = $_POST['product_id'];
		$ip = getIp();

        $check_cart = $connection->prepare("SELECT * FROM `cart` WHERE `product_id` = :product_id AND `ip_addr` = :ip_addr");
        $check_cart->bindValue(':product_id', $product_id);
        $check_cart->bindValue(':ip_addr', $ip);
        $check_cart->execute();

        if ($check_cart->rowCount() == 1) {
            echo "<script>alert('This product Already added in your cart!');</script>";
        }else{

    		$cart = $connection->prepare("INSERT INTO `cart`(product_id, qty, ip_addr) VALUES(:product_id,:qty,:ip_addr)");
    		$cart->bindValue(':product_id',$product_id);
    		$cart->bindValue(':qty',1);
    		$cart->bindValue(':ip_addr',$ip);
    		$cart->execute();
    		if (expr) {
    			echo "<script>window.open('index.php','_self');</script>";
    		} else {
    			echo "<script>alert('Try Again !!!');</script>";
    		}
        }
	}
}
 
function cartCount(){
    include 'connection.php';
    $ip = getIp();
    $cart_item = $connection->prepare("SELECT * FROM `cart` WHERE `ip_addr` = :ip_addr");
    $cart_item->bindValue(':ip_addr', $ip);
    $cart_item->execute();
    $cart_count = $cart_item->rowCount();
        echo $cart_count;
}

function cartDisplay(){
    include 'connection.php';
    $ip = getIp();
    $query = $connection->prepare("SELECT * FROM `cart` WHERE `ip_addr` = :ip_addr");
    $query->bindValue(':ip_addr', $ip);
    $query->execute();
    if ($query->rowCount() == 0) {
        echo "<h2 class='text-center text-danger'>No Product Added in your Cart.</h2>";
    }else{
    $cart_data = $query->fetchAll();

    if (isset($_POST['up_qty'])) {
        $qty = $_POST['qty'];

        foreach ($qty as $key => $value) {
            $update_qty = $connection->prepare("UPDATE `cart` SET `qty`= :qty WHERE `cart_id` = :cart_id");
            $update_qty->bindValue(':qty', $value);
            $update_qty->bindValue(':cart_id', $key);
            if($update_qty->execute()){
                echo "<script>window.open('cart.php', '_self');</script>";
            }
        }
    }

    $net_total = 0;
?>
    <?php foreach ($cart_data as $value): ?>
        <?php 
            $product_id = $value['product_id'];
            $pro_query =$connection->prepare("SELECT * FROM `products` WHERE `product_id` = :product_id");
            $pro_query->bindValue(':product_id', $product_id);
            $pro_query->execute();
            $pro_data = $pro_query->fetch();
        ?>
        <tr>
            <td class="card_product_image" data-th="Image">
                <a href="#">
                    <img class="img-responsive" src="uploads/product/<?php echo $pro_data['product_photo']; ?>" alt="">
                </a>
            </td>
            <td class="card_product_name" data-th="Product Name">
                <a href="#"><?php echo $pro_data['product_name'];; ?></a>
            </td>
            <!-- <td class="card_product_model" data-th="Model">Pro 3</td> -->
            <td class="card_product_quantity" data-th="Quantity">
                .<input type="number" min="0" value="<?php echo $value['qty']; ?>" name="qty[<?php echo $value['cart_id']; ?>]" class="styler">
                &nbsp;
                <input type="submit" class="" name="up_qty" value="Save">
                &nbsp;
            </td>
            <td class="card_product_price" data-th="Unit Price"><?php echo $pro_data['product_price']; ?></td>
            <td class="">
                <a href="delete.php?id=<?php echo $pro_data['product_id']; ?>"><i class="fa fa-trash fa-lg"></i> </a>
            </td>
            <?php 

            ?>
            <td class="card_product_total" data-th="Total">
                <?php
                    $qty = $value['qty'];
                    $product_price = $pro_data['product_price'];
                    $sub_total = $product_price*$qty;
                    echo $sub_total; 
                    $net_total = $net_total+$sub_total;
                    $_SESSION['net_total'] = $net_total;
                ?>
            </td>
        </tr>
    <?php endforeach; 
        
        }
    }
?>

<?php
function delete_cart(){
    include 'connection.php';
    if (isset($_GET['id'])) {
        $del_query = $connection->prepare("DELETE FROM `cart` WHERE `product_id` = :product_id");
        $del_query->bindValue(':product_id', $_GET['id'], PDO::PARAM_INT);
        if($del_query->execute()){
            echo "<script>alert('Product Deleted Successfully!!');</script>";
            echo "<script>window.open('cart.php', '_self');</script>";
        }
    }
}

function search(){
	include 'connection.php';
	if (isset($_GET['search'])) {
	$src_query = $_GET['src_query'];
		
	$search_query =$connection->prepare("SELECT * FROM `products` WHERE `Product_name` LIKE '%$src_query%'");
	$search_query->setFetchMode(PDO:: FETCH_ASSOC);
	$search_query->execute();
	// $search_data = $search_query->fetch();
	if ($search_query->rowCount() == 0) {
		echo '<div class="alert alert-danger">Product Not Found With This Keyword</div>';
	}else{

	?>	
	<?php while ($search_data = $search_query->fetch()): ?>
		<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
            <div class="row">
                <div class="product">
                    <figure class="figure-hover-overlay">                                                                        
                        <a href="#" class="figure-href"></a>
                        <div class="product-sale">sale</div>
                        <img class="img-responsive" src="uploads/product/<?php echo $search_data['product_photo']; ?>" alt="" title="">
                        <span class="bar"></span>
                        <figcaption>
                            <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                            <a href="#" class="shoping"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                            <a href="#" title="Compare"><i class="glyphicon glyphicon-sort"></i></a>
                        </figcaption>
                    </figure>
                    <div class="product-caption">
                        <a href="product-details.php?pro_id=<?php echo $search_data['product_id']; ?>" class="product-name"><?php echo $search_data['product_name']; ?></a>
                        <p class="product-price"><span>330$ </span> <?php echo $search_data['product_price']; ?> Tk.</p>
                        <div class="product-rating">
                            <div class="stars">
                                <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
	<?php endwhile ;
	}

	?>
<?php
	}
}

function checkOut(){
    include 'connection.php';

    if (isset($_POST['billing_details'])) {
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
        $name = $_POST[''];
    }
}

?>