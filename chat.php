<<<<<<< HEAD
<?php
 function read()
 {
   $fptr=fopen("chatroom.txt","r+");
   while($mess=fgets($fptr))
     echo nl2br(htmlspecialchars($mess));
   fclose($fptr);
 }
 function write()
 {
   $fptr=fopen("chatroom.txt","a+");
   fwrite($fptr,$_POST['name'].date("[Y-m-d H-m-s]",time()).$_POST['con']."\n");
   fclose($fptr);
 }
 ?>
<html>
<head>
<title>Chat Room</title>
<meta http-equiv="Content-Language" content="utf-8">
</head>
<body background="http://flow-er.lomo.jp/sozai/kabe/006/hana7.gif">
 <h1 style="color:blue;" align="center"> Welcome to neiyu's chatroom :D</h1>
 <form action="chat.php"method="post">
 Name:<input type="text"name="name"/><br />
 Context:<br />
 <textarea row="200" cols="50" name="con">
 </textarea>
 <input type="submit"/><br />
  <?php
  if(isset($_POST['name']))
     write();
  read();   
  ?>
</body>
</html>

=======
CTYPE html>
<html>
<body>

<?php
	// Function prototypes
	
	function func_write($user, $msg, $date)
	{
		$f = fopen("board.txt", "a+");
		
		$str = '<br />' . 	htmlspecialchars($user) .
							' (' . $date . ') said : <br />' .
							htmlspecialchars($msg);
		fwrite($f, $str);
		
		fclose($f);
	}
	
	function func_read_all()
	{
		$f = fopen("board.txt", "r+");
		$rst = "";
		
		while ( !feof($f))
		{
			$line = fgets($f);
			$line = $line;
			$rst .= $line . "<br />";
		}
		
		fclose($f);
		
		return $rst;
	}

?>


<?php
	// Declaration
	$username = "";
	
	session_start();
	
	// Get clear action
	
	
	// Get post info.
	if (isset($_POST['username']) && isset($_POST['messages']))
	{
		$tmp_user = $_POST['username'];
		$tmp_msg  = $_POST['messages'];
		$tmp_date = date("Y-m-d H:i:s");
		
		func_write($tmp_user, $tmp_msg, $tmp_date);
		
		$_SESSION['username'] = $tmp_user;
	}
	
	// Get user information
	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
	}

?>



<h1>It's a fucking chat room</h1>



<form action="chat.php" method="POST">
	<!-- Name field -->
	<br />
	Name : <br />
	<input type="text" name="username" size="50" value="<?php if ("" != $username) echo $username; ?>"
	/>

	<!-- Message field -->
	<br /><br />
	Messages : <br />
	<textarea name="messages" cols="80" rows="10" style="font-size:18px" onfocus="this.select()"></textarea>

	<!-- Submit button -->
	<br /><br />
	<input type="submit" name="submit" value="Submit" />
</form>

<form action="chat.php" method="POST">
	

	<!-- Clear button -->
	<br /><br />
	<input type="submit" name="clear" value="Clear" />
</form>


<!-- Messages -->
<?php
	
	print(func_read_all());

?>

<br /><br />

</body>
</html>



>>>>>>> 4c785a24ac70f6a1eb0d0d3633d5b6cab00432a6
