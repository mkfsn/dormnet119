<?php
	session_start();
	
	if ( isset($_POST['name']) && isset($_POST['message']) )
	{
		$temp_name = $_POST['name'];
		$temp_message = $_POST['message'];
		func_write ( $temp_name , $temp_message );
		
	}
	if ( isset($_POST['clear']) )
	{
		func_clear (  );
	}
?>

<?php
	
	function func_write ( $name , $message  )
	{	
		$file = fopen ( "write.txt" , "a+" );
		$str = '<br />' . "( " . date("Y/m/d-H:i:s") . " ) " . $name . ' said ' . ': ' . $message . '<br />';
		
		fwrite ( $file , $str );
	
		fclose ( $file );
	}
	
	function func_read (  )
	{
		$file = fopen ( "write.txt" , "r+" );
		
		$temp_str = "";
		
		while ( $str = fgets($file) )
		{
			$temp_str .= $str . '<br />';
		}
	
		return $temp_str;
	}
	
	function func_clear (  )
	{
		$file = fopen ( "write.txt" , "w" );
		
		fwrite ( $file , "" );
		
		fclose ( $file ) ;
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>My First Chatting Room</title>
	</head>

	<body bgcolor="#E0FFFF">

		<h1 align="center">My First Chatting Room<br /></h1>
		
		<b><font face="標楷體" color="#EE7AE9" size="4">☆∵　▁▂▄▂▁．★∵∴☆．★∴<br>∴★◢█████◣* ☆．∴★∵ * ☆<br>☆◢████☆██◣．∴天氣冷了,☆<br>◢■◤█████◥█◣．送你一件毛衣,<br>◥◤∴█████．◥◤∵小心別著涼了！<br> .∴☆ █████ :^^
		</font></b>
		
		<form method="post">
		Name: <br /><input type="text" name="name" /><br />
		
		<br />
		Message: <br />
		<textarea rows="10" cols="20" name="message"></textarea>
		
		<br />
		<input type="submit" value="Send" />
		
		</form>

		
		
		
		
		<form method='post'>
		
		<input type="hidden" value="clear" name="clear"/>
		<input type="submit" value="clear" />
		
		</form>
		
		
		
		
		<?php
			
			echo func_read(  ) ;
		
		?>
		
		
	</body>
</html>
