<?php 
	$dsn = 'mysql:dbname=team2GuestDB;host=140.117.202.136';
	$user = 'team2GuestDB';
	$password = 'team2GuestPass';

	try {
    		$dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
	catch (PDOException $e) {
    		echo 'Connection failed: ' . $e->getMessage();
	}
?>
