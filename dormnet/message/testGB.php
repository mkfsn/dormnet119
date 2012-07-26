<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
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
                if($tmp['id']%2==0)
		    echo  "<div><table width='540' border='1' align='right' >"; 
		else
		    echo  "<div><table width='540' border='1' align='left' >";

		 echo  "<tr><td colspan='2' height=25px> " . htmlspecialchars( $tmp['timestamp'] ) . "</td></tr>";
		 echo  "<tr><td height='25px' width='100px'>" . htmlspecialchars( $tmp['name'] ) . "</td>";
		 echo  "<td height='25px' width='440px'>" .  htmlspecialchars( $tmp['mail'] ) . "</td></tr>";
            	 echo  "<tr><td colspan='2'>" . htmlspecialchars( $tmp['msg'] ) . "</table></div>";
		 echo  "<br/><br/><br/><br/>";
            }
            //$fp=fopen("room.txt","r+");
            //while ( $content = fgets($fp) )
            //{
                //echo nl2br(htmlspecialchars($content));
            //}
            //fclose($fp);
        }

        function write()
        {
            require( "mysql.php" );
            $sql=" INSERT INTO `team2GuestDB`.`GuestBook` (`id`, `name`, `msg`, `timestamp`) VALUES (NULL, :name, :msg, CURRENT_TIMESTAMP) ";
            $stm = $dbh->prepare($sql);
            $stm->execute( array( ':name'=>$_POST['user'],':msg'=>$_POST['message'] ) );
            //$fp=fopen("room.txt","a+");
            //fwrite($fp,date( "[ Y/m/d H:i:s ] ",time() ) . $_POST['user']."  :  ".$_POST['message']."\n");
            //fclose($fp);
        }
	    
        if( isset($_POST['user']) )
		    write();
			
        read();


    ?>

</body>

</html>
