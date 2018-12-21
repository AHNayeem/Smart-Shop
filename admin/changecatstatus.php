<?php  
	include 'inc/connection.php';
	$idandstatus = $_GET['cat_id'];
	$explode = explode("-","$idandstatus");
	$id = $explode[0];

	if ($explode[1] === '0') {
		$status = '1';
	}elseif ($explode[1] === '1') {
		$status = '0';
	}

	$query = $connection->prepare("UPDATE `categories` SET `status` = :status WHERE `categories`.`category_id` = :category_id");
	$query->bindValue(':category_id', $id);
	$query->bindValue(':status', $status);
	$query->execute();
	if ($query) {
		header("Location:index.php?page=categoryDetails");
	}
	// UPDATE `categories` SET `status` = '0' WHERE `categories`.`category_id` = 1;
?>