<html>
<head>
    <title>~~Chat~~</title>
    <style type="text/css">
	body
	{
	    background-repeat:repeat-x;
	    background-image:url('http://flow-er.lomo.jp/sozai/kabe/010/sita5.gif');
	    background-position:center bottom;
	}
    </style>
</head>
<body>
    <div style="background-repeat:repeat;
            background-image:url('http://flow-er.lomo.jp/sozai/kabe/011/kabe57.gif');">    
    <h1><center><strong> -- Let's Chat!! -- </strong></strong></h1>
    <form action="chatroom.php"method="post">
    UserName:<input type="text" name="user"/><br />
    Message:<br />
    <textarea rows="4" cols="50" name="message"></textarea>
    <br />
    <input type="submit"  value="submit"/>
    </form>
    </div>
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

	isset($_POST['user']) ? write() : false;
	read();


    ?>    
</body>
</html>
