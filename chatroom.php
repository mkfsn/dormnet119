<html>
<head>
    <title>~~Chat~~</title>
</head>
<body>
    
    <form action="chatroom.php"method="post">
    UserName:<input type="text" name="user"/><br />
    Message:<br />
    <textarea rows="4" cols="50" name="message"></textarea>
    <br />
    <input type="submit"  value="submit"/>
    </form>
    <hr/>
    <?php
	//print_r($_POST['user']);
	//echo "<br />";
	//print_r($_POST['message']);

	function read()
	{
	    $fp=fopen("room.txt","r+");
	    while ( $content = fgets($fp) ) 
	    {
		echo nl2br(htmlspecialchars($content));
	    }
	    fclose($fp);
	}
	
	function write()
	{
	    $fp=fopen("room.txt","a+");
	    fwrite($fp,date( "[ Y/m/d H:i:s ] ",time() ) . $_POST['user']."  :  ".$_POST['message']."\n");
	    fclose($fp);
	}

	if( isset( $_POST['user'] ) )
	{
	    write();
	}
	read();


    ?>    
</body>
</html>
