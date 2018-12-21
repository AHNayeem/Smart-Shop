<?php

	include 'inc/connection.php';

	$stmt = $connection->prepare("DELETE FROM `categories` WHERE `category_id` = :category_id");
	$stmt->bindValue(':category_id', $_GET['id'], PDO::PARAM_INT);
	$stmt->execute();

	if ($stmt->rowCount() === 1) {
		$stmt = $connection->prepare("ALTER TABLE `categories` AUTO_INCREMENT = 1");
		$stmt->execute();
	}

	header("Location: index.php?page=categoryDetails");
?>