<?php

	include 'inc/connection.php';
	
	$stmt = $connection->prepare("DELETE FROM `products` WHERE `product_id` = :product_id");
	$stmt->bindValue(':product_id', $_GET['id'], PDO::PARAM_INT);
	$stmt->execute();

	if ($stmt->rowCount() === 1) {
		$stmt = $connection->prepare("ALTER TABLE `products` AUTO_INCREMENT = 1");
		$stmt->execute();
	}

	header("Location: index.php?page=productList");
?>