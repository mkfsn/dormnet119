<?php
	// Way 1 : Get host automatically
	// $host = $_SERVER['HTTP_HOST'];
	
	// Way 2 : Set host manually (No trailing slash)
	$host = "http://140.117.202.136/~ebola777/dormnet_new";
	
	// Require main index file
	require($host . "/index.php");
?>
