<?php 
/* Connect to an ODBC database using driver invocation */
    $dsn = 'mysql:dbname=team2GuestDB;host=140.117.202.136';
    $user = 'team2GuestDB';
    $password = 'team2GuestPass';

    try 
    {
    	$dbh = new PDO($dsn, $user, $password);
    } 
    catch (PDOException $e) 
    {
    	echo 'Connection failed: ' . $e->getMessage();
    }

?>
