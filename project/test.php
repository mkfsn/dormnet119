<html>
	<head>
		<title>Tiny GuestBook</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="refresh" content="300" />
	</head>
	<body bgcolor="silver">

	<h1 align="center">Tiny GuestBook</h1>

	<hr/>

		<form action="test.php" method="post">
		<table>
			<tr>
				<td><label>Name:</label></td>
				<td><input type="text" name="fname" /><br /></td>
			</tr>
			<tr>
				<td><label>Content:</label></td>
				<td><textarea rows="3" cols="16" name="msg"></textarea></td>
			</tr>
			<tfoot>
				<tr><td><input type="submit" value="Send"/></td></tr>
			</tfoot>
		</table>
		</form>
</body>
</html>
<?php
$file = fopen("test.txt","a+");
 fwrite($file,$_POST['fname'].":".$_POST['msg']. "<br />");
fclose($file);
?>
<?php
$file = fopen("test.txt", "r");
while(! feof($file))
  {
  echo fgets($file);
  }

fclose($file);
?>
