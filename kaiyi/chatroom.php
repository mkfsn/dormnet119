<html>
<head>
    <title>Chatroom</title>
    <meta charset="utf8"/>
    <style type="text/css">
	body
	{
	    background-repeat:repeat;
	    background-image:url('http://flow-er.lomo.jp/sozai/kabe/008/dot27.gif');
	    background-position:center;
	    text-align:center;
	}
	hr
	{
	    height: 25px;
	    background-repeat:repeat;
            background-image:url('http://flow-er.lomo.jp/sozai/line/001/ha1.gif');
            background-position:center;
	}
	fieldset
        {
            height: 290px;
	    width: 500px;
            text-align:center;
	    margin: auto;
        }
    </style>
</head>
<body>
    
    <img src="http://flow-er.lomo.jp/sozai/wel/012/kodomo1.gif" align="absmiddle"/>   
    <font size=7> -- Let's Chat!! -- </font>
    <img src="http://flow-er.lomo.jp/sozai/icon/013/inu4.gif" align="absmiddle"/>
    <br />    
    <form action="chatroom.php"method="post">
	<fieldset>
	<legend><font size=5>Join in</font></legend>
    	<p>UserName</p><input type="text" name="user"/><br />
    	<p>Message</p>
    	<textarea rows="4" cols="50" name="message"></textarea>
    	<br />
    	<input type="submit"  value="submit"/>
	</fieldset>
    </form>
    <hr />

    <?php
	//print_r($_POST['user']);
	//echo "<br />";
	//print_r($_POST['message']);

	function read()
	{
	    require( "mysql.php" );
            $sql = "SELECT * FROM `GuestBook`";

    	    $sth = $dbh->query($sql);
    	    foreach( $sth as $tmp )
	    {
		echo  htmlspecialchars( "[ " . $tmp['timestamp'] . "  ] " . $tmp['name'] . " : " . $tmp['msg'] ) . '<br />' ;
	    }
	    //$fp=fopen("room.txt","r+");
	    //while ( $content = fgets($fp) ) 
	    //{
		//echo nl2br(htmlspecialchars($content));
	    //}
	    //fclose($fp);
	}
	
	function write(  )
	{
	    require( "mysql.php" );
	    $sql=" INSERT INTO `team2GuestDB`.`GuestBook` (`id`, `name`, `msg`, `timestamp`) VALUES (NULL, :name, :msg, CURRENT_TIMESTAMP) ";
	    $stm = $dbh->prepare($sql);
	    $stm->execute( array( ':name'=>$_POST['user'],':msg'=>$_POST['message'] ) );
	    //$fp=fopen("room.txt","a+");
	    //fwrite($fp,date( "[ Y/m/d H:i:s ] ",time() ) . $_POST['user']."  :  ".$_POST['message']."\n");
	    //fclose($fp);
	}
	
	isset($_POST['user']) ? write() : false;
	read();


    ?>
    
</body>
</html>
