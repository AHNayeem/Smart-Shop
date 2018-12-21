<?php 

$dns 	  = 'mysql:host=localhost;dbname=smart_shop';
$username = 'root';
$password = '';
$option   = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', );

try {
	$connection = new PDO($dns, $username, $password);
	//Set the error reporting mode.
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Set fetch mode.
	$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	// echo 'Database Connected Successfully!';
} catch (Exception $e) {
	echo 'Connection Failed' . $e->getMessage();
}

?>