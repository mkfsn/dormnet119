
<?php	// [Info.] The following will be included in main page : div class "content"
?>


			<!-- @start 留言處 -->
			<div id="left_div"  >
        			<form method="post">
				<table class="msg_box" align="center" style="text-align:center">
					<tr>
				    	<td colspan="2"><h2>留言板</h2></td>
					</tr>
	    				<tr>
                			    <td style="width:10px;">name</td>
                			    <td><input type="text" width="150px" name="msg_name" value=" "/></td>
            				</tr>
            				<tr>
                			    <td>email</td>
                			    <td><input type="text" name="msg_mail"/></td>
            				</tr>        
      				        <tr>
                			    <td>msg</td>
					    <td></td>
            				</tr>
            				<tr>
                			    <td colspan="2"><textarea  style="width:220px; height:100px" name="msg_content"></textarea> </td>
            				</tr>
            				<tr>
       	        			    <td colspan="2">
                			    <input type="submit" value="Send" style="width:100px"/>
                			    <input type="reset" value="Reset" style="width:100px"/>
                			    </td>            
            				</tr>
        			</table>
        			</form>
    			</div>
<?php
    function input()
    {
        require("mysql.php");
        $sql = "INSERT INTO `team2GuestDB`.`GuestBook` (`id`, `name`, `mail`, `msg`,`timestamp`) VALUES (NULL, :name, :mail, :msg, CURRENT_TIMESTAMP);";
        $dbh->query($sql);
        $stm = $dbh->prepare($sql);
        $stm->execute(array( ':name' => $_POST['msg_name'], ':mail' => $_POST['msg_mail'], ':msg' => $_POST['msg_content']));
    }
   
    function output($n)
    {
        require( "mysql.php" );
        $sql = "SELECT * FROM `GuestBook` ORDER BY `timestamp` DESC";

        $sth = $dbh->query($sql); $sth2 = $dbh->query($sql);
        foreach( $sth as $tmp )
        {
	    if($tmp['replyid']==0)
	    {
	    	$n=$n+1;
            	if($n%2==0)
            	    echo  "<div><table class='msgtable right' >";
            	else
                    echo  "<div><table class='msgtable left' >";


            	echo  "<tr><td colspan='2'>Time: " . htmlspecialchars( $tmp['timestamp'] ) . "</td></tr>";
            	echo  "<tr><td width='10px'>Name: " . htmlspecialchars( $tmp['name'] ) . "</td>";
            	echo  "<td width='50px'>Mail: " .  htmlspecialchars( $tmp['mail'] ) . "</td></tr>";
            	echo  "<tr><td colspan='2'>Message:<br/>　　" . htmlspecialchars( $tmp['msg'] ). "</td></tr>";
	    	echo  "<tr><td colspan='2'>Reply:</td></tr>";
	        /*$sql2 = "SELECT `msg` FROM `GuestBook` WHERE `id`=".$tmp['replyid'];
		$stm->execute(array( 'id' => $tmp['replyid']));*/
		foreach( $sth2 as $tmp2 )
        	{
            	    if($tmp2['replyid']==$tmp['id'])
            	    {
			//echo  "<table class='msgtable left' >";
                	echo  "<tr><td colspan='2'>　　>" . htmlspecialchars( $tmp2['msg'] ) . "</td></tr>";
                	
            	    }
		
            	}
		$sth2 = $dbh->query($sql);
		echo "</table>";
	        echo  "<table align='center'><tr><td><form method='post'><textarea name='replyMsg'></textarea><input type='hidden' name='replyid' value='".$tmp['id']."'><input type='submit' value='Reply'></form></td></tr>";	
		echo  "</table></div>";

	    }
	    
        }
    }

    function reply()
    {
	require("mysql.php");
	$sql = "INSERT INTO `team2GuestDB`.`GuestBook` (`msg`, `replyid`) VALUES (:msg, :replyid);";
	$dbh->query($sql);
        $stm = $dbh->prepare($sql);
	
        $stm->execute(array( ':msg' => $_POST['replyMsg'], ':replyid' => $_POST['replyid']));
    }
    
    if( ($_POST['msg_name']!=' ') && ($_POST['msg_content']!=NULL) )
    {
	input();
	$_POST['msg_name']=' ';
	$_POST['msg_content']=NULL;
    }
    if ( ($_POST['replyMsg']!=NULL) ) {
	reply();
	$_POST['replyMsg']=NULL;
    }

?>




<div style=" position:relative; left:30%; width:60%;">
<?php
    output();
?>
</div>
